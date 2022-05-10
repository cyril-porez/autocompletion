document.addEventListener('DOMContentLoaded', (event)=> {
    
    let recherche = document.getElementById('recherche')
    let liste = document.getElementById('liste')

    recherche.addEventListener('keyup', (e) => {
         // tu cree un var = form , tu crées une variable qui contient = new formdta(form), 
      
        if (recherche.value.length >= 2) {

            let ul = document.createElement('ul')
            

            console.log('test')
            formulaire = new FormData
            formulaire.append('recherche', recherche.value)
    
            fetch('autocompletion.php', {
                method: 'post',
                body: formulaire
            })
            .then((response) => {
                return response.json()
            })
            .then((data) => {            
                for (let i = 0; i < data.length; i++) {
                    ///if ( != null) {
                        let li = document.createElement('li')
                        console.log(data[i])
                        li.innerHTML = data[i].nom
                        liste.append(ul.appendChild(li))
                   // }
                }
            })
        }
        else {
            liste.innerHTML = '';
        }
    })
})  