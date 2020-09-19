const opt = [
	{
		name:'bagmati',
		options:[ 
			{
				name: 'Banepa',
				options:[
					'28 Kilo Area',
					'Banepa Chowk Area',
					'Basghari Area',
					'Budol Area',
					'Chandeshwori Temple Area',
					'Dhulikhel Area',
					'Naya Basti Area',
					'Tindobato Area'
				]
			},
			{
				name: 'Bhaktapur',
				options:[
					'Balkot Area',
					'Gaththaghar Area',
					'Jagati Area',
					'Kamalbinayak Area',
					'Katunje Area',
					'Lohakanthali Area',
					'Sallaghari Area',
					'Sano Thimi Area',
					'Suryabinayak Area',
					'Thimi Area'
				]
			},
			{
				name: 'Kathmandu Metro 10 - New Baneshwor Area',
				options:[
				   'Buddhanagar',
				   'New Baneshwor'
				]
			},
			{
				name: 'Kathmandu Metro 11 - Maitighar Area',
				options:[
			       'Babarmahal',
					'Central Jail',
					'Dasharath Stadium',
					'Kalmochan Ghat',
					'Maitighar',
					'Shahid Gate',
					'Thapathali',
					'Tripureshwor'
				]
			},
			{
				name: 'Kathmandu Metro 12 - Teku Area',
				options:[
				   'Teku'
				]
			},
			{
				name: 'Kathmandu Metro 13 - Kalimati Area',
				options:[
			        'Bafal',
					'Chhauni',
					'Kalimati',
					'Kharibot',
					'Soltimode',
					'Tahachal'
				]
			},
			{
				name: 'Kathmandu Metro 14 - Kuleshwor Area',
				options:[
			       'Balkhu',
					'Kalanki',
					'Kuleshwor',
					'Ravi Bhawan'
				]
			},
			{
				name: 'Kathmandu Metro 15 - Swayambhu Area',
				options:[
		            'Bahiti',
					'Bijeshwori',
					'Sobhabhagawati',
					'Swayambhu'
				]
			},
			{
				name: 'Kathmandu Metro 16 - Nayabazar Area',
				options:[
		            'Balaju',
					'Balaju Chauki',
					'Banasthali',
					'Kaldhara',
					'Khusibu',
					'Paknajol'
				]
			},
			{
				name: 'Kathmandu Metro 17 - Chhetrapati Area',
				options:[
		            'Chhetrapati',
					'Dhalko',
					'Dhobichaur'
				]
			},
			{
				name: 'Kathmandu Metro 18 - Raktakali Area',
				options:[
		            'Bhurungkhel',
					'Raktakali'
				]
			},
			{
				name: 'Kathmandu Metro 19 - Hanumandhoka Area',
				options:[
		            'Hanumandhoka',
					'Tamsipakha'
				]
			},
			{
				name: 'Kathmandu Metro 1 - Naxal Area',
				options:[
		            'Durbarmarg',
					'Jamal',
					'Kantipath',
					'Naxal'
				]
			},
			{
				name: 'Kathmandu Metro 20 - Marutol Area',
				options:[
		            'Durbarmarg',
					'Jamal',
					'Kantipath',
					'Naxal'
				]
			},
			{
				name: 'Kathmandu Metro 21 - Lagantole Area',
				options:[
		            'Ikubahal',
					'Lagantole',
					'Tebahal'
				]
			},
			{
				name: 'Kathmandu Metro 22 - Newroad Area',
				options:[
		            'Dharmapath',
					'Khichhapokhari',
					'Newroad',
					'Sundhara'
				]
			},
			{
				name: 'Kathmandu Metro 23 - Basantapur Area',
				options:[
					'Basantapur'
				]
			},
			{
				name: 'Kathmandu Metro 24 - Indrachowk Area',
				options:[
		            'Indrachowk',
					'Naradevi'
				]
			},

			{
				name: 'Kathmandu Metro 25 - Ason Area',
				options:[
		            'Ason',
					'Kilagal',
					'Tengal'
				]
			},

			{
				name: 'Kathmandu Metro 26 - Lainchaur Area',
				options:[
		            'Galkhopakha',
					'Gongabu',
					'Jyatha',
					'Kapurdhara',
					'Lainchaur',
					'Mehpi'
				]
			},

			{
				name: 'Kathmandu Metro 27 - Bhotahiti Area',
				options:[
		            'Bhotahiti',
					'Kamalakshi'
				]
			},

			{
				name: 'Kathmandu Metro 28 - Bagbazar Area',
				options:[
		            'Bagbazar',
					'Bhrikutimandap',
					'Rantapark'
				]
			},
			{
				name: 'Kathmandu Metro 29 - Anamnagar Area',
				options:[
		            'Anamnagar',
					'Ghattekulo',
					'Singha Durbar'
				]
			},
			{
				name: 'Kathmandu Metro 29 - Putalisadak Area',
				options:[
					'Putalisadak'
				]
			},
			{
				name: 'Kathmandu Metro 2 - Lazimpat Area',
				options:[
		            'Dhobichaur',
					'Gairidhara',
					'Lazimpat'
				]
			},
			{
				name: 'Kathmandu Metro 30 - Maitidevi Area',
				options:[
		            'Dillibazar',
					'Gyaneshwor',
					'Maitidevi'
				]
			},
			{
				name: 'Kathmandu Metro 31 - Min Bhawan Area',
				options:[
		            'Aloknagar',
					'Bhimsengola',
					'Min Bhawan',
					'Sankhamul',
					'Shantinagar'
				]
			},
			{
				name: 'Kathmandu Metro 32 - Koteshwor Area',
				options:[
		            'Kandaghari',
					'Koteshwor',
					'Mahadevsthan'
				]
			},
			{
				name: 'Kathmandu Metro 32 - Tinkune Area',
				options:[
		            'Subidhanagar',
					'Tinkune'
				]
			},
			{
				name: 'Kathmandu Metro 3 - Baluwatar Area',
				options:[
		            'Baluwatar',
					'Panipokhari'
				]
			},
			{
				name: 'Kathmandu Metro 3 - Maharajgunj Area',
				options:[
		            'Maharajgunj',
					'Teaching Hospital'
				]
			},
			{
				name: 'Kathmandu Metro 4 - Bishalnagar Area',
				options:[
		            'Bishalnagar',
					'Chandol',
					'Duhumarahi'
				]
			},
			{
				name: 'Kathmandu Metro 5 - Tangal Area',
				options:[
		            'Handigaun',
					'Tangal'
				]
			},
			{
				name: 'Kathmandu Metro 7 - Chabahil Area',
				options:[
		            'Chabahil',
					'Kumarigal',
					'Kumaristhan',
					'Mitrapark',
					'Siphal'
				]
			},
			{
				name: 'Kathmandu Metro 8 - Gaushala Area',
				options:[
		            'Gaurighat',
					'Gaushala',
					'Guhyeshwari',
					'Pashupathinath'				
					]
			},
			{
				name: 'Kathmandu Metro 9 - Sinamangal Area',
				options:[
		            'Airport',
					'Battisputali',
					'Gaurigaun',
					'Old Baneshwor',
					'Sinamangal',
					'Tilganga'
				]
			},
			{
				name: 'Kathmandu Outside Ring Road',
				options:[
		            'Lalitpur - Nakhipot Area',
					'Ward 10 - Chakupat Area',
					'Ward 11 - Banglamukhi Area',
					'Ward 12 - Thaina Area',
					'Ward 14 - Kusunti Area',
					'Ward 15 - Lagankhel Area',
					'Ward 15 - Satdobato Area',
					'Ward 16 - Mangalbazar Area',
					'Ward 17 - Gwarko Area',
					'Ward 19 - Macchindrabahal Area',
					'Ward 1 - Kupandol Area',
					'Ward 20 - Patandhoka Area',
					'Ward 2 - Jhamsikhel Area',
					'Ward 2 - Sanepa Area',
					'Ward 2 - Teku Area',
					'Ward 3 - Pulchowk Area',
					'Ward 4 - Jawalakhel Area',
					'Ward 5 - Kumaripati Area',
					'Ward 5 - Patan Hospital Area',
					'Ward 6 - Kanibahal Area',
					'Ward 7 - Sundhara Area',
					'Ward 8 - Guitole Area',
					'Ward 9 - Balkumari Area'
				]
			},
			{
				name: 'Lalitpur Inside Ring Road',
				options:[
		            'Lalitpur - Nakhipot Area',
					'Ward 10 - Chakupat Area',
					'Ward 11 - Banglamukhi Area',
					'Ward 12 - Thaina Area',
					'Ward 14 - Kusunti Area',
					'Ward 15 - Lagankhel Area',
					'Ward 15 - Satdobato Area',
					'Ward 16 - Mangalbazar Area',
					'Ward 17 - Gwarko Area',
					'Ward 19 - Macchindrabahal Area',
					'Ward 1 - Kupandol Area',
					'Ward 20 - Patandhoka Area',
					'Ward 2 - Jhamsikhel Area',
					'Ward 2 - Sanepa Area',
					'Ward 2 - Teku Area',
					'Ward 3 - Pulchowk Area',
					'Ward 4 - Jawalakhel Area',
					'Ward 5 - Kumaripati Area',
					'Ward 5 - Patan Hospital Area',
					'Ward 6 - Kanibahal Area',
					'Ward 7 - Sundhara Area',
					'Ward 8 - Guitole Area',
					'Ward 9 - Balkumari Area'
				]
			},
			{
				name: 'Lalitpur Outside Ring Road',
				options:[
		            'Lalitpur - Bhaisepati Area',
					'Lalitpur - Bungamati Area',
					'Lalitpur - Chokhel Area',
					'Lalitpur - Dhapakhel Area',
					'Lalitpur - Harisiddhi Patan Area',
					'Lalitpur - Imadole Area',
					'Lalitpur - Khokana Karyabinayak Area',
					'Lalitpur - Nakhu Area',
					'Lalitpur - Sunakoti Area'
				]
			}
		]
	},
	{
		name:'bheri',
		options:[ 
			{
				name: 'Nepalgunj',
				options:[
					'Adrash Nagar Area',
					'Basudevpur Area',
					'Belaspur Area',
					'Bhawanipur Area',
					'BP Chowk Area',
					'Dhamboji Area',
					'Indrapur Area',
					'Jaisapur Area',
					'Khaskarkado Area',
					'Manikapur Area',
					'Nepalgunj Buspark Area',
					'Prasapur Area',
					'Puraina Area',
					'Udayapur Area'
				]
			},
			{
				name: 'Surkhet',
				options:[
					'Army Camp Area',
					'Dhuliyabit Area',
					'Kakrebihar Area',
					'Mangalgadhi Chowk Area',
					'Radio Nepal Area',
					'Surkhet Hospital Area',
					'Uttarganga Area'
				]
			}
		]
	},
	{
		name:'gandaki',
		options:[ 
			{
				name: 'pokhara',
				options:[
					'Airport Area',
					'Amarsingh Chowk Area',
					'Bagar Area',
					'Baglung Buspark Area',
					'Baidam Area',
					'Barpatan Area',
					'Buspark Area',
					'Chauthe Area',
					'Chipledhunga Area',
					'Davis Falls Area',
					'Fulbaari Area',
					'Gandaki Hospital Area',
					'Himalayan Museum Area',
					'Lamachaur Area',
					'Mahendrapul Area',
					'Malepatan Area',
					'Masbar Area',
					'Matepani Area',
					'Nadipur Area',
					'Nayabazar Area',
					'Newroad Area',
					'Prashyang Area',
					'Prithvi Chowk',
					'Rambazaar Area',
					'Ramghat Area',
					'Ratna Chowk Area',
					'Simalchaur Area',
					'Tudikhel Area'
				]
			}
		]
	},
	{
		name:'janakpur',
		options:[ 
			{
				name: 'Janakpur',
				options:[
					'Adarsh Nagar',
					'Balmiki Nagar',
					'Brahmapura Chowk',
					'Cigarette Factory Area',
					'Hanuman Nagar',
					'Janaki Mandir Area',
					'Janakpur Airport Area',
					'Kishori Nagar',
					'Mills Area',
					'Mujelia Area',
					'Murali Chowk',
					'Pidari Chowk',
					'Pulchowk',
					'Ramanand Chowk',
					'Ram Chowk',
					'Wakil Tole',
					'Zero Mile'
				]
			}
		]
	},
	{
		name:'koshi',
		options:[ 
			{
				name: 'Biratnagar',
				options:[
					'Bargacchi Chowk Area',
					'Bhirkuti Chowk Area',
					'Campus Road Area',
					'Haat Khola Area',
					'Hospital Chowk',
					'Jaljala Chowk Area',
					'Janpathtole Area',
					'Kanchanbari Area',
					'Madumara Area',
					'Mahendra Chowk Area',
					'Maisthan Area',
					'Mangadh Area',
					'Paani Tanki Area',
					'Panchali Tole Area',
					'Puset Area',
					'Pushpalal Chowk Area',
					'Rangashala Area',
					'Rani Chowk Area',
					'Shanihat Area',
					'Shankarpur Area',
					'Siddhartha Chowk Area',
					'Sikshya Sadan School Area',
					'Traffic Chowk'
				]
			},
			{
				name: 'Dharan',
				options:[
					'Bagarkot Area',
					'Bargachi Area',
					'Bhanu Chowk Area',
					'Bhotepul Area',
					'Bijayapur Area',
					'BP Health Science Institute Area',
					'Chata Chowk Area',
					'Deshi line',
					'Dharan Railway Area',
					'Dharan Stadium Area',
					'Mangalbarey Area',
					'Phushre Area',
					'Purano Bazaar',
					'Putali line',
					'Shyam Chowk Area',
					'Tinkune Area',
					'Zero Point Area'
				]
			},
			{
				name: 'Itahari',
				options:[
					'Army Headquarters Area',
					'Balgram Area',
					'Birat Chowk Area',
					'Duhabi City Area',
					'Gaisar Area',
					'Goth Gaun City Area',
					'Halgada Chowk Area',
					'Hatiya Line Area',
					'Itahari Buspark Area',
					'Jhumka City Area',
					'Khanar City Area',
					'Labipur Area',
					'Padariya Area',
					'Pakali Area',
					'Pandhare Tole Area',
					'Suvidha Nagar',
					'Swagat Tole Area',
					'Tal Talaiya Area',
					'Tarahara Area',
					'Tax Office Area',
					'Traffic Chowk Area'
				]
			},
			{
				name: 'Urlabari',
				options:[
					'Aaitabare Area',
					'Barghachi Chowk Area',
					'Durgapuri Area',
					'Madhumalla Area',
					'Mangalbare Area',
					'Pathri Area'
				]
			}
		]
	},
	{
		name:'lumbini',
		options:[ 
			{
				name: 'Bhairahawa',
				options:[
					'Bhairahawa Airport Area',
					'Bhairahawa Buspark Area',
					'Brishapati College Area',
					'Buddha Chowk Area',
					'Butwal Customs Area',
					'Darkachua Area',
					'Devkota Chowk Area',
					'Durga Colony',
					'Electricity Office Area',
					'Milan Chowk Area',
					'Ranigaun Area',
					'Universal College Area'
				]
			},
			{
				name: 'Butwal',
				options:[
					'Buspark Area',
					'Butwal Campus Area',
					'Butwal Industrial Area',
					'Charsira Marg',
					'Deep Nagar',
					'Devinagar',
					'Gadi Tole',
					'Haatbazaar Area',
					'Kalika Mandir Tole',
					'Kalika Nagar',
					'Maina Bagar Area',
					'Nepalgunj Road Area',
					'Ramnagar',
					'Saraswati Tole',
					'Shrawan Chowk',
					'Sukhha Nagar',
					'Traffic Chowk Area',
					'Yogi Kuti Area'
				]
			}
		]
	},
	{
		name:'mechi',
		options:[ 
			{
				name: 'Bhadrapur',
				options:[
					'Bhadrapur Buspark Area',
					'Campus Mode Area',
					'Dukhi Tole Area',
					'Giri Chowk Area',
					'Kirat Colony Area',
					'Mechi Hospital Area'
				]
			},
			{
				name: 'Birtamod',
				options:[
					'Anarmuni Area',
					'Birtamod Buspark Area',
					'Buttabari Area',
					'Charpane Area',
					'Mechi Eye Hospital Area',
					'Mukti Chowk Area',
					'Pathivara Hall Area',
					'Ramchowk Area',
					'Ranibirta Area',
					'Trishuli Chowk Area'
				]
			},
			{
				name: 'Chandragadi',
				options:[
					'Bhaire Chowk',
					'Chaitu Mandir Area',
					'Chandragadi Airport Area',
					'Devkota Chowk Area',
					'Dhanushmod Area',
					'Jagriti Nagar',
					'Kendramode Area',
					'Lekhnath Chowk Area',
					'Mahendra Park Area'
				]
			},
			{
				name: 'Damak',
				options:[
					'Beldangi Area',
					'Buddha Chowk Area',
					'Damak Buspark Area',
					'Damak Multiple Campus Area',
					'Falgunanda Chowk Area',
					'Gumaune Area',
					'Havildar Chowk Area',
					'Krishna Mandir Area',
					'Makalu Tole Area',
					'New Amda Hospital Area',
					'Sangam Chowk Area',
					'Shanti Chowk Area',
					'Shanti Marga Area'
				]
			},
			{
				name: 'Kakarbhitta',
				options:[
					'Barmeli Tole Area',
					'Eye Hospital Area',
					'Kakarbhitta Buspark Area',
					'Kakarbhitta Customs Area',
					'Post Office Area',
					'Pragati Tole Area'
				]
			}
		]
	},
	{
		name:'narayani',
		options:[ 
			{
				name: 'Bharatpur',
				options:[
					'Airport Area',
					'Beni Chowk Area',
					'Birendra Campus Area',
					'Cancer Hospital Area',
					'Chaubiskoti Area',
					'Hakim Chowk Area',
					'Munal Chowk Area',
					'Paras Buspark Area'
				]
			},
			{
				name: 'Birgunj',
				options:[
					'Adarshnagar Area',
					'Birgunj Buspark Area',
					'Birgunj Customs Area',
					'Birta Area',
					'Brahma Chowk Area',
					'Chhapkaiya Area',
					'Chitragupt Area',
					'Gahawa Mai Area',
					'Ghadiharwa Pokhari Area',
					'Ghantaghar Area',
					'Minabazaar Area',
					'Murali Area',
					'Powerhouse Area',
					'Pratima Chowk Area',
					'Radhemai Area',
					'Ranighat Area',
					'Resham Kothi Area',
					'Shreepur Area'
				]
			},
			{
				name: 'Hetauda',
				options:[
					'Buddha Chowk',
					'Cement Factory Area',
					'Chauki Tole Area',
					'China Quarters Area',
					'Eye Hospital Area',
					'Forestry Institute Area',
					'Golpingtar Area',
					'Hetauda Buspark Area',
					'Hetauda Industrial Estate',
					'Hupra Chaur Area',
					'Kamal Dada',
					'Makwanpur Campus Area',
					'Sanopokhara Area',
					'TCN Area'
				]
			},
			{
				name: 'Jeetpur - Simara',
				options:[
					'Auraha Area',
					'Badan Nagar Area',
					'Bajeni Area',
					'Barack Area',
					'Boring Tole',
					'Hulas Area',
					'Jagadamba Area',
					'Jeetpur Bazar Area',
					'Kera Dhoka Area',
					'Laxmi Hall Area',
					'Narbasti Area',
					'Nepal Boards Area',
					'Paani Tanki Area',
					'Pahadi Tole',
					'Shanti Tole',
					'Shiv Parvati Hall Area',
					'Simara Airport Area',
					'Simara Chowk Area',
					'Simara Colony',
					'Simara Powerhouse Area',
					'Surya Niwas Area',
					'Telecom Area'
				]
			},
			{
				name: 'Narayanghat',
				options:[
					'Barhaghare Area',
					'Barmatole Area',
					'Basant Chowk Area',
					'Baseni Area',
					'Belchowk Area',
					'Bhojad Area',
					'Bhrikuti Paper Mills Area',
					'Buspark Area',
					'Champa Chaur Area',
					'Gauriganj Area',
					'Indradev Marga Area',
					'Jalma Hall Area',
					'Junhall Road',
					'Kamal Nagar Area',
					'Krishnapur Area',
					'Lankhu Area',
					'Lions Chowk Area',
					'Narayani Path Area',
					'Om Sai Chowk Area',
					'Pokhara Buspark Area',
					'Putalisadak Area',
					'Shahid Chowk Area',
					'Sharadpur Area',
					'Thulo Balkumari Area'
				]
			}
		]
	},
	{
		name:'rapti',
		options:[ 
			{
				name: 'Dang - Ghorahi',
				options:[
					'Bharatpur Area',
					'Chaughera Area',
					'Ghorahi Buspark Area',
					'Nayabazar Area',
					'NewRoad Area',
					'Ratanpur Area',
					'Sahidgate Area',
					'Traffic Chowk Area',
					'Tulsipur Chowk Area'
				]
			},
			{
				name: 'Dang - Tulsipur',
				options:[
					'Bahini chowk Area',
					'BP Chowk Area',
					'Ganeshpur Area',
					'Parseni Area',
					'Shitalpur Area',
					'Tarigaun Area',
					'Tulsipur Buspark Area'
				]
			}
		]
	},
	{
		name:'seti',
		options:[ 
			{
				name: 'dhangadi',
				options:[
					'Adarsha Tole Area',
					'Badhara Area',
					'Baiya Behandi',
					'Bishalnagar Area',
					'Campus Road Area',
					'Chatakpur Area',
					'Chauraha Area',
					'Hasanpur Area',
					'Jai Area',
					'Kailali District Court Area',
					'Om Shanti Tole',
					'Santoshi Tole Area',
					'Taranagar Area',
					'Uttar Behandi'
				]
			}
		]
	}
];
var times = 1;

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

			if(times == 1){
			span.textContent = item.textContent
			span.className = 'search__dirList'
			times++;
		}
			// let ele = `<span>${v.name}</span>`
			document.querySelector('.search__dir').appendChild(span)

			console.log(item.textContent)
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
				// console.log(v.name)
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
					span.textContent = `  > ${it.textContent}`
					span.className = 'search__dirList'
					// let ele = `<span>${v.name}</span>`
					document.querySelector('.search__dir').appendChild(span)


					//Adding city on address
					address['city'] = it.textContent


					//Changing oplaceholder
					document.querySelector('.search__input').placeholder = "Choose nearby place"

					//Deleting exixting options
					search__optionsDiv.innerHTML = '';

					//Changing options

					opt[index].options[ind].options.forEach((v, i) => {
						// console.log(v.name)
						let span = document.createElement('span')
						// console.log(v)
						// console.log(v[i])
						span.textContent =  v 
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
							document.querySelector('.btn_con_add_change').innerHTML = ` ( ${address.region}  ,${address.city} ,${address.near} )  <button class='button_addres_changer_adder' onclick="showFilter()"></button>`;
							document.querySelector(".search__options").innerHTML = "";

							document.querySelector(".search__dir").innerHTML = '<div class="right" onclick="cross()">X</div>';
							document.querySelector(".button_addres_changer_adder").innerHTML = "Change Address >";
							times = -1 ;
							opt.forEach((v, i) => {
								let span = document.createElement('span')
								span.textContent = v.name
								span.className = 'search__optionsBox'
								search__optionsDiv.appendChild(span)
								recU();
							})

							// document.querySelectorAll(".search__optionsBoxCity").forEach(function(elm , i){
							// elm.innerHTML ="";
							// })
							
							// document.querySelectorAll(".search__optionsBoxNearby").forEach(function(elm , i){
							// 	elm.innerHTML ="";
							// 	})
							
							// 	document.querySelectorAll(".search__dirList").forEach(function(elm , i){
							// 		elm.innerHTML ="";
							// 		})
									

						})
					})
				})
			})
		})
	})
})();
const showFilter = () => {
	document.querySelector('.search__container').style.display = 'block';
}

function cross(){
	document.querySelector('.search__container').style.display = "none"

}