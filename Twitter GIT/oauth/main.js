reqwest({
 url: 'test.php',
 contentType: 'application/json',
 success: successHandler,
 error: errorHandler
})

function successHandler(data){
var ID_Tweet =  data.statuses['0'].id_str
// console.log(ID_Tweet)
var link_tweet = "https://twitter.com/DeSpeld/status/" + ID_Tweet + "?ref_src=twsrc%5Etfw"
// console.log(link_tweet)
var twitter_element = document.getElementsByClassName('twitterlink')
console.log(twitter_element)

console.log(document.getElementsByClassName("twitterlink").outerHTML)
// twitter_element.setAttribute('href', "https://democlass.nl")
}

function errorHandler(error){
 console.log('dit gaat mis ', error);
}