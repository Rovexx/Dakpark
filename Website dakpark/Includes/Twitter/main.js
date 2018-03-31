reqwest({
 url: 'Includes/Twitter/API-koppeling.php',
 contentType: 'application/json',
 success: successHandler,
 error: errorHandler
})

function successHandler(data){
console.log(data.statuses)
for(let i = 0; i < 3; i++){
    //ID van Tweet ophalen
    var ID_Tweet =  data.statuses[i].id_str
    
    //De twittergebruiker ophalen 
    var Twitter_gebruiker = data.statuses[i].entities.user_mentions['0'].screen_name
    console.log(data.statuses[i])
    
    //String met link opbouwen
    var link_tweet = "https://publish.twitter.com/oembed?url=https://twitter.com/" + Twitter_gebruiker + "/status/" + ID_Tweet + ""
    //console.log(link_tweet)
    //Twitter element opzoeken
    var elementID = "twitterlink" + i
    // console.log(elementID)

    var twitter_element = document.getElementById(elementID)
    twitter_element.href = link_tweet

    //console.log(link_tweet)
}

loadScript("https://platform.twitter.com/widgets.js")

}


function errorHandler(error){
 console.log('dit gaat mis ', error);
}

function loadScript(url)
{
    // Adding the script tag to the head as suggested before
    var head = document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = url;

    // // Then bind the event to the callback function.
    // // There are several events for cross browser compatibility.
    // script.onreadystatechange = callback;
    // script.onload = callback;

    // Fire the loading
    head.appendChild(script);
}