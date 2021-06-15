document.addEventListener('DOMContentLoaded', () => {
    /**
     * НАЧАТЬ send_push_notification
     * эта часть обрабатывает кнопку, которая вызывает конечную точку, которая запускает уведомление
     * в реальном мире вам это не понадобится, потому что уведомления обычно отправляются из бэкэнд-логики
     */

    const sendPushButton = document.querySelector('#send-push-button');
    if (!sendPushButton) {
        return;
    }

    sendPushButton.addEventListener('click', () =>
        navigator.serviceWorker.ready
            .then(serviceWorkerRegistration => serviceWorkerRegistration.pushManager.getSubscription())
            .then(subscription => {
                if (!subscription) {
                    alert('Пожалуйста, включите push-уведомления');
                    return;
                }

                const contentEncoding = (PushManager.supportedContentEncodings || ['aesgcm'])[0];
                const jsonSubscription = subscription.toJSON();
                console.log(JSON.stringify(Object.assign(jsonSubscription, { contentEncoding })));
                fetch('send_push_notification.php', {
                    method: 'POST',
                    body: JSON.stringify(Object.assign(jsonSubscription, { contentEncoding })),
                });
            })
    );
    /**
     * END send_push_notification
     */
});
