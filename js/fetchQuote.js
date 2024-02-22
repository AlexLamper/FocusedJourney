// Function to fetch a random quote from the API
function fetchQuoteOnce() {
    console.log("FUNCTION RUN");
    fetch('https://api.quotable.io/random')
        .then(response => response.json())
        .then(data => {
            document.getElementById('quoteText').textContent = data.content;
            document.getElementById('quoteAuthor').textContent = data.author;
        })
        .catch(error => console.error('Error fetching quote:', error));
}
