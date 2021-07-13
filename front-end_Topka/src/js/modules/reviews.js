  function reviews() {
	const paytip = document.querySelector('.paytip');
	if (paytip) {
	const review = paytip.querySelector('.paytip__review'),
	reviewStar = review.querySelector('.paytip__starRating'),
	reviewBtn = review.querySelector('.review_button'),
	reviewTitle = review.querySelector('.paytip__review__title');
	function showReview() {
	   review.className = 'paytip__review openReview';
	}
	function closeReview() {
	   review.className = 'paytip__review';
	}
	reviewStar.addEventListener('click', showReview);
	
	const stars = reviewStar.querySelectorAll('.star');
	let rating = 0;
	   stars.forEach((star, i) => {
		  star.addEventListener('click', () => {
			 rating = i + 1;
			 console.log(rating);
			 for (let n = 0; n <= i; n++) {
				stars[n].classList.add('rate');
				for (let m = 1; m <= 4-i; m++) {
				   stars[n+m].classList.remove('rate');
				}
			 }
		  });
	   }); 
	const inputReview = review.querySelector('.paytip__review__input');
	
	const reviewSend = (e) => {
	  e.preventDefault();
	  console.log(inputReview.value);
	  const reviewData = new FormData();
	  reviewData.append('rate', rating);
	  reviewData.append('review', inputReview.value)
	  axios.post('/call', reviewData)  //Вставить роут для отзывов!
	  .then(() => {
		 inputReview.value = '';
		 closeReview();
		 notif('Спасибо Вам за отзыв', '.wrapper', 2000);
	  })
	};
	reviewBtn.addEventListener('click', reviewSend);
 }}

 export default reviews;