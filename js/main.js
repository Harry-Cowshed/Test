let addCiderBtn = document.getElementById('addCiderBtn');
if (addCiderBtn) {
    fetch("http://localhost/wordpress/wp-json/wp/v2/ciders").then(function(response){
        return response.json();
    }).then(function(posts){
        console.log(posts);
    })


    function addCider(e) {
        e.preventDefault();
       
        // const ciderData = {
        //     "title": document.querySelector('.ciderForm [name="cider-name"]').value,
        //     "content": document.querySelector('.ciderForm [name="cider-content"]').value,
        //     "status": "publish",
        // }

        // const ciderPost = new XMLHttpRequest();
        // ciderPost.open("POST", "http://localhost/wordpress/wp-json/wp/v2/ciders");
        // ciderPost.setRequestHeader("X-WP-Nonce", wpApiSettings.nonce);
        // ciderPost.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        // ciderPost.send(JSON.stringify(ciderData));

        // fetch('http://localhost/wordpress/wp-json/wp/v2/ciders',{
        //     method: "POST",
        //     headers:{
        //         'Content-Type': 'application/json',
        //         'accept': 'application/json',
        //         'Authorization': false
        //     },
        //     body:JSON.stringify(ciderData),
        // }).then(function(response){
        //     return response.json();
        // }).then(function(post){
        //     console.log(post);
        // });

        wp.api.loadPromise.done( function() {

            // Create a new post
            var ciderPost = new wp.api.models.Ciders(
                {
                  title: document.querySelector('.ciderForm [name="cider-name"]').value,
                  content: document.querySelector('.ciderForm [name="cider-content"]').value,
                  status: 'publish',  
              }
            );
          
            var xhr = ciderPost.save( null, {
               success: function(response) {
                 console.log(response);
                 document.getElementById('ciderForm').reset(); // clear form
               },
               error: function(response) {
                 console.log(response);
               }
             });
          
          });


    }

    // On click
    addCiderBtn.addEventListener('click', addCider);
}

