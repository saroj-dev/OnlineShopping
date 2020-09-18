const opt = [
	{
		name: 'lumbini',
		options: [
			{
				name: 'butwal',
				options: [
					'Bus park',
					'Kalikanagar',
					'Sukkhanagar'
				]
			},
			{
				name: 'bhairahawa',
				options: [
					'bhairawaha Bus park',
					'bhairawa Kalikanagar',
					'bhairawa Sukkhanagar'
				]
			}
		]
	},
	{
		name: 'lumbini1',
		options: [
			{
				name: 'butwal1',
				options: [
					'Bus park1',
					'Kalikanagar1',
					'Sukkhanagar1'
				]
			},
			{
				name: 'bhairahawa1',
				options: [
					'bhairawaha Bus park1',
					'bhairawa Kalikanagar1',
					'bhairawa Sukkhanagar1'
				]
			}
		]
	},
	{
		name: 'lumbini2',
		options: [
			{
				name: 'butwal2',
				options: [
					'Bus park2',
					'Kalikanagar2',
					'Sukkhanagar2'
				]
			},
			{
				name: 'bhairahawa2',
				options: [
					'bhairawaha Bus park2',
					'bhairawa Kalikanagar2',
					'bhairawa Sukkhanagar2'
				]
			}
		]
	},
	{
		name: 'lumbini3',
		options: [
			{
				name: 'butwal3',
				options: [
					'Bus park3',
					'Kalikanagar3',
					'Sukkhanagar3'
				]
			},
			{
				name: 'bhairahawa3',
				options: [
					'bhairawaha Bus park3',
					'bhairawa Kalikanagar3',
					'bhairawa Sukkhanagar3'
				]
			}
		]
	},
	{
		name: 'lumbini4',
		options: [
			{
				name: 'butwal4',
				options: [
					'Bus park4',
					'Kalikanagar4',
					'Sukkhanagar4'
				]
			},
			{
				name: 'bhairahawa4',
				options: [
					'bhairawaha Bus park4',
					'bhairawa Kalikanagar4',
					'bhairawa Sukkhanagar4'
				]
			}
		]
	}
];


const search__optionsDiv = document.querySelector('.search__options');


let address = {}
opt.forEach((v, i) => {
	// console.log(v.name)
	let span = document.createElement('span')
	span.textContent = v.name
	span.className = 'search__optionsBox'
	// let ele = `<span>${v.name}</span>`
	search__optionsDiv.appendChild(span)
	// console.log(ele)
})


const filterOut = (e) => {
	let query = e.value.toLowerCase()
	//console.log(query)
	let span = search__optionsDiv.getElementsByTagName('span')
	// console.log(span)
	// console.log(span.length)

	for (let i = 0; i < span.length; i++) {
		const optValue = span[i].textContent.toLowerCase();
		// console.log(optValue)
		if (optValue.indexOf(query) > -1) {
			// console.log('matched')
			span[i].style.display = 'block'
			setTimeout(() => {
				span[i].style.transform = 'scaleY(1)'
			}, 250)
		}
		else {
			//console.log('not matched')
			span[i].style.transform = 'scaleY(0)'
			setTimeout(() => {
				span[i].style.display = 'none'
			}, 250)
		}
	}
}

(function recU() {


	let searchOptionsBox = document.querySelectorAll('.search__optionsBox')

	searchOptionsBox.forEach((item, index) => {
		item.addEventListener('click', (e) => {
			// console.log(e)
			// console.log(item,index)

			//Adding directory
			let span = document.createElement('span')
			span.textContent = item.textContent
			span.className = 'search__dirList'
			// let ele = `<span>${v.name}</span>`
			document.querySelector('.search__dir').appendChild(span)


			//Adding region on address
			address['region'] = item.textContent


			//Changing oplaceholder
			document.querySelector('.search__input').placeholder = "Select city"

			//Deleting exixting options
			search__optionsDiv.innerHTML = ''

			//Changing options
			//console.log(opt[index].options)
			opt[index].options.forEach((v, i) => {
				// console.log(v.name)
				let span = document.createElement('span')
				span.textContent = v.name
				span.className = 'search__optionsBoxCity'
				// let ele = `<span>${v.name}</span>`
				//console.log(item)
				search__optionsDiv.appendChild(span)
				// console.log(ele)

			})




			//Nearby places
			let searchOptionsBoxCity = document.querySelectorAll('.search__optionsBoxCity')
			searchOptionsBoxCity.forEach((it, ind) => {
				it.addEventListener('click', (e) => {
					// console.log(e)


					//Adding directory
					let span = document.createElement('span')
					span.textContent = `  >> ${it.textContent}`
					span.className = 'search__dirList'
					// let ele = `<span>${v.name}</span>`
					document.querySelector('.search__dir').appendChild(span)


					//Adding city on address
					address['city'] = it.textContent


					//Changing oplaceholder
					document.querySelector('.search__input').placeholder = "Choose nearby place"

					//Deleting exixting options
					search__optionsDiv.innerHTML = ''

					//Changing options

					opt[ind].options[ind].options.forEach((v, i) => {
						// console.log(v.name)
						let span = document.createElement('span')
						// console.log(v)
						// console.log(v[i])
						span.textContent = v
						span.className = 'search__optionsBoxNearby'
						// let ele = `<span>${v.name}</span>`

						search__optionsDiv.appendChild(span)
						// console.log(ele)
					})


					let searchOptionsBoxNearby = document.querySelectorAll('.search__optionsBoxNearby')
					searchOptionsBoxNearby.forEach((ite, inde) => {
						ite.addEventListener('click', (e) => {
							//Adding nearby place on address
							address['near'] = ite.textContent
							document.querySelector('.search__container').style.display = 'none'
							document.querySelector('.product_page_display_address').innerHTML = `
				${address.region} > ${address.city} > ${address.near}
			`;
							document.querySelector(".search__options").innerHTML = "";

							document.querySelector(".search__dir").innerHTML = "";

							opt.forEach((v, i) => {
								let span = document.createElement('span')
								span.textContent = v.name
								span.className = 'search__optionsBox'
								search__optionsDiv.appendChild(span)
								recU();
							})


						})
					})
				})
			})
		})
	})
})();

// window.onclick = function(event) {
//   if (!(event.target.matches('.search__container' && event.target.matches('.')) {
//     let elements = document.querySelector(".search__container").childNodes

//     	document.querySelector('.search__container').style.display ='none'
//     }
// }


const showFilter = () => {
	document.querySelector('.search__container').style.display = 'block';
}

