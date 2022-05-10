document.addEventListener("DOMContentLoaded", (event)=>{
    let recherche = document.getElementById('recherche');

    recherche.addEventListener('keyup', (event)=>{
        // tu cree un var = form , tu crées une variabl qui contient = new formdta(form), 
        let value = JSON.stringify({'recherche': recherche.value})
        console.log(value)
        fetch('autocompletion.php', {
            method: 'POST',
            body: value,
        })
        .then(function(response){
            response.json()
        .then(function (data){
            console.log(data)
        })
    })
    })
})
