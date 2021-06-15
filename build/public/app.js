document.addEventListener('DOMContentLoaded', () => {
  const applicationServerKey =
    'BMBlr6YznhYMX3NgcWIDRxZXs0sh7tCv7_YCsWcww0ZCv9WGg-tRCXfMEHTiBPCksSqeve1twlbmVAZFv7GSuj0';
  let isPushEnabled = false;

  const pushButton = document.querySelector('#push-subscription-button');
  if (!pushButton) {
    return;
  }

  pushButton.addEventListener('click', function() {
    if (isPushEnabled) {
      push_unsubscribe();
    } else {
      push_subscribe();
    }
  });

  if (!('serviceWorker' in navigator)) {
    console.warn('Сервисные функции не поддерживаются этим браузером');
    changePushButtonState('incompatible');
    return;
  }

  if (!('PushManager' in window)) {
    console.warn('Push-уведомления не поддерживаются этим браузером');
    changePushButtonState('incompatible');
    return;
  }

  if (!('showNotification' in ServiceWorkerRegistration.prototype)) {
    console.warn('Уведомления не поддерживаются этим браузером');
    changePushButtonState('incompatible');
    return;
  }

  // Check the current Notification permission.
  // If its denied, the button should appears as such, until the user changes the permission manually
  if (Notification.permission === 'denied') {
    console.warn('Уведомления отклоняются пользователем');
    changePushButtonState('incompatible');
    return;
  }

  navigator.serviceWorker.register('serviceWorker.js').then(
    () => {
      console.log('[SW] Service worker был зарегистрирован');
      push_updateSubscription();
    },
    e => {
      console.error('[SW] Service worker регистрация не удалась', e);
      changePushButtonState('incompatible');
    }
  );

  function changePushButtonState(state) {
    switch (state) {
      case 'enabled':
        pushButton.disabled = false;
        pushButton.textContent = 'Отключить Push-уведомления';
        isPushEnabled = true;
        break;
      case 'disabled':
        pushButton.disabled = false;
        pushButton.textContent = 'Включить Push-уведомления';
        isPushEnabled = false;
        break;
      case 'computing':
        pushButton.disabled = true;
        pushButton.textContent = 'Загрузка...';
        break;
      case 'incompatible':
        pushButton.disabled = true;
        pushButton.textContent = 'Push-уведомления не совместимы с этим браузером';
        break;
      default:
        console.error('Необработанное состояние кнопки', state);
        break;
    }
  }

  function urlBase64ToUint8Array(base64String) {
    const padding = '='.repeat((4 - (base64String.length % 4)) % 4);
    const base64 = (base64String + padding).replace(/\-/g, '+').replace(/_/g, '/');

    const rawData = window.atob(base64);
    const outputArray = new Uint8Array(rawData.length);

    for (let i = 0; i < rawData.length; ++i) {
      outputArray[i] = rawData.charCodeAt(i);
    }
    return outputArray;
  }

  function checkNotificationPermission() {
    return new Promise((resolve, reject) => {
      if (Notification.permission === 'denied') {
        return reject(new Error('Push messages are blocked.'));
      }

      if (Notification.permission === 'granted') {
        return resolve();
      }

      if (Notification.permission === 'default') {
        return Notification.requestPermission().then(result => {
          if (result !== 'granted') {
            reject(new Error('Bad permission result'));
          } else {
            resolve();
          }
        });
      }

      return reject(new Error('Unknown permission'));
    });
  }

  function push_subscribe() {
    changePushButtonState('computing');

    return checkNotificationPermission()
      .then(() => navigator.serviceWorker.ready)
      .then(serviceWorkerRegistration =>
        serviceWorkerRegistration.pushManager.subscribe({
          userVisibleOnly: true,
          applicationServerKey: urlBase64ToUint8Array(applicationServerKey),
        })
      )
      .then(subscription => {
        // Subscription was successful
        // create subscription on your server
        return push_sendSubscriptionToServer(subscription, 'POST');
      })
      .then(subscription => subscription && changePushButtonState('enabled')) // update your UI
      .catch(e => {
        if (Notification.permission === 'denied') {
          // Пользователь отказал в разрешении на уведомление, которое
          // означает, что мы не смогли подписаться и пользователю потребуется
          // вручную изменить разрешение уведомления на
          // подписаться на push-сообщения
          console.warn('Уведомления отклоняются пользователем.');
          changePushButtonState('incompatible');
        } else {
          // A problem occurred with the subscription; common reasons
          // include network errors or the user skipped the permission
          console.error('Невозможно подписаться на push-уведомления', e);
          changePushButtonState('disabled');
        }
      });
  }

  function push_updateSubscription() {
    navigator.serviceWorker.ready
      .then(serviceWorkerRegistration => serviceWorkerRegistration.pushManager.getSubscription())
      .then(subscription => {
        changePushButtonState('disabled');

        if (!subscription) {
          // We aren't subscribed to push, so set UI to allow the user to enable push
          return;
        }

        // Keep your server in sync with the latest endpoint
        return push_sendSubscriptionToServer(subscription, 'PUT');
      })
      .then(subscription => subscription && changePushButtonState('enabled')) // Set your UI to show they have subscribed for push messages
      .catch(e => {
        console.error('Ошибка при обновлении подписки', e);
      });
  }

  function push_unsubscribe() {
    changePushButtonState('computing');

    // To unsubscribe from push messaging, you need to get the subscription object
    navigator.serviceWorker.ready
      .then(serviceWorkerRegistration => serviceWorkerRegistration.pushManager.getSubscription())
      .then(subscription => {
        // Check that we have a subscription to unsubscribe
        if (!subscription) {
          // No subscription object, so set the state
          // to allow the user to subscribe to push
          changePushButtonState('disabled');
          return;
        }

        // We have a subscription, unsubscribe
        // Remove push subscription from server
        return push_sendSubscriptionToServer(subscription, 'DELETE');
      })
      .then(subscription => subscription.unsubscribe())
      .then(() => changePushButtonState('disabled'))
      .catch(e => {
        // Не удалось отписаться, это может привести к
        // необычное состояние, поэтому лучше удалить
        // данные пользователей из вашего хранилища данных и
        // сообщаем пользователю, что вы это сделали
        console.error('Ошибка при отмене подписки пользователя', e);
        changePushButtonState('disabled');
      });
  }

  function push_sendSubscriptionToServer(subscription, method) {
    const key = subscription.getKey('p256dh');
    const token = subscription.getKey('auth');
    const contentEncoding = (PushManager.supportedContentEncodings || ['aesgcm'])[0];

    return fetch('/PushSubscription', {
      method,
      body: JSON.stringify({
        endpoint: subscription.endpoint,
        publicKey: key ? btoa(String.fromCharCode.apply(null, new Uint8Array(key))) : null,
        authToken: token ? btoa(String.fromCharCode.apply(null, new Uint8Array(token))) : null,
        contentEncoding,
      }),
    }).then(() => subscription);
  }

  /**
   * НАЧАТЬ send_push_notification
   * эта часть обрабатывает кнопку, которая вызывает конечную точку, которая запускает уведомление
   * в реальном мире вам это не понадобится, потому что уведомления обычно отправляются из бэкэнд-логики
   */
  //
  // const sendPushButton = document.querySelector('#send-push-button');
  // if (!sendPushButton) {
  //   return;
  // }
  //
  // sendPushButton.addEventListener('click', () =>
  //   navigator.serviceWorker.ready
  //     .then(serviceWorkerRegistration => serviceWorkerRegistration.pushManager.getSubscription())
  //     .then(subscription => {
  //       if (!subscription) {
  //         alert('Пожалуйста, включите push-уведомления');
  //         return;
  //       }
  //
  //       const contentEncoding = (PushManager.supportedContentEncodings || ['aesgcm'])[0];
  //       const jsonSubscription = subscription.toJSON();
  //       fetch('send_push_notification.php', {
  //         method: 'POST',
  //         body: JSON.stringify(Object.assign(jsonSubscription, { contentEncoding })),
  //       });
  //     })
  // );
  /**
   * END send_push_notification
   */
});
