import {notif, showNav} from '../services/services';
import axios from 'axios';

function regCard() {
    if (document.querySelector('.regCard')) {
        showNav();
		const regCard = document.querySelector('.regCard'),
		regForm = regCard.querySelector('.regCard__wrapper');
		async function getData() {
			const data = await axios.get('/GetProfileDate')
			.then(r => r.data.staff_id)
			.catch(e => console.error(e));
			const staffIdField = regCard.querySelector('#staff_id');
			console.log(data);
			staffIdField.value = data;
		}

		const fields = [
			{id: 1, label: 'Имя', placeholder: 'Введите ваше имя', type: 'text', name: 'first_name', error: '', required: 'required'},
			{id: 2, label: 'Фамилия', placeholder: 'Введите вашу фамилию', type: 'text', name: 'last_name', error: '', required: 'required'},
			{id: 3, label: 'Отчество', placeholder: 'Введите ваше отчество', type: 'text', name: 'patronymic', error: '', required: 'required'},
			{id: 4, label: 'Дата рождения', placeholder: 'дата', type: 'date', name: 'birth_date', error: '', required: 'required'},
			{id: 5, label: 'ИНН', placeholder: 'Введите ваш ИНН', type: 'text', name: 'inn', error: '', required: 'required'},
			{id: 6, label: 'СНИЛС', placeholder: 'Введите ваш СНИЛС', type: 'text', name: 'snils', error: '', required: 'required'},
			{id: 7, label: 'Адрес', placeholder: 'Введите адрес регистрации', type: 'text', name: 'address', error: '', required: 'required'},
			{id: 8, label: 'Почта', placeholder: 'Введите вашу почту', type: 'email', name: 'email', error: '', required: 'required'},
		];

		function renderField({id, label, placeholder, type, name, error, required}) {
			return (
				`<div class="regCard__field">
					<div class="regCard__label">
						${label}
					</div>
					<input id=${id} class="regCard__input" 
						placeholder=${placeholder.replaceAll(' ', '&nbsp;')} 
						type=${type} 
						name=${name}
						${required} /> 
					<div class="regCard__error">
						${error}
					</div>
				</div>`
			)
		}

		function render() {
			const fieldsBox = document.querySelector('.regCard__fields');
			fieldsBox.innerHTML = fields.map(item => renderField({...item})).join('');
		}

		regForm.addEventListener('submit', (e) => {
			e.preventDefault();
			const formData = new FormData(regForm);
			const data = Object.fromEntries(formData.entries());
			axios.post('/regCard', formData)
			.then(r => location = r.data.url)
			.catch(e => console.error(e))
			console.log(data);
		})

		getData();
		render();
    }
}
export default regCard;