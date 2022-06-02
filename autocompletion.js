document.addEventListener('DOMContentLoaded', (event)=> {
    
    let recherche = document.getElementById('recherche')
    let liste = document.getElementById('liste')
    let liste2 = document.getElementById('liste2')
    let resultat = document.getElementById('rechercher')

    


    recherche.addEventListener('keyup', (e) => {

        if (recherche.value.length >= 2) {
            
            resultat.addEventListener('click', function(event) {
                event.preventDefault()
                console.log('essaie')
                document.location.href = 'recherche.php?search='+ recherche.value
            })
            
            let formulaire = new FormData()
            formulaire.append('recherche', recherche.value)
                        

            fetch('autocomplet.php', {
                method: 'post',
                body: formulaire
            })
            .then((response) => {
                return response.json()
            })
            .then((data) => {
                console.log('test3')
                let ul = document.createElement('ul')

                let ulreset = liste.firstChild
                if (ulreset !== null) {   
                    ulreset.remove()
                }

                
                for (let i = 0; i < data.length; i++) {
                    console.log(data[i])
                    let li = document.createElement('li')
                    li.innerHTML +=  data[i].nom + ' ' + data[i].prenom
                    ul.append(li)

                    li.addEventListener('click',  function() {
                        recherche.value = data[i].id    
                        document.location.href = 'element.php?id='+ recherche.value
                    })  
                    
                }
                liste.append(ul)               
            })
        }
    }) 

    recherche.addEventListener('keyup', (e) => {
        // tu cree un var = form , tu crées une variable qui contient = new formdta(form), 
      
        if (recherche.value.length >= 2) {
            
            console.log('test')
            formulaire = new FormData()
            formulaire.append('recherche', recherche.value)
    
            fetch('autocompletion.php', {
                method: 'post',
                body: formulaire
            })
            .then((response) => {
                return response.json()
            })
            .then((data) => {

                let ulreset = liste2.firstChild
                if (ulreset !== null) {   
                    ulreset.remove()
                }
                
                let ul = document.createElement('ul')
                for (let i = 0; i < data.length; i++) {

                    let li = document.createElement('li')
                    console.log(data[i])
                    li.innerHTML = data[i].nom + ' ' + data[i].prenom
                    ul.append(li)


                    li.addEventListener('click',  function() {
                        recherche.value = data[i].id
    
                        document.location.href = 'element.php?id='+ recherche.value
                    })                  
                }
        
                liste2.append(ul)                  
            })
        }
        else {
            liste.innerHTML = '';
        }
    })    
})  