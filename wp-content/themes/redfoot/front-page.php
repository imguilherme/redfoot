<?php
add_filter('genesis_attr_body', 'add_mobi_frontpage_css');

function add_mobi_frontpage_css($attr) {
    // add original plus extra CSS classes
    $attributes['class'] .= ' frontpage';

    // return the attributes
    return $attributes;
}

add_action('mobi_landing_loop', 'add_mobi_frontpage_content');

function add_mobi_frontpage_content() {
    ?>

 <script src="https://www.gstatic.com/firebasejs/4.1.3/firebase.js"></script>
 <script type="text/javascript">

  var config = {
    apiKey: "AIzaSyCzoCeBX7gBttsVSeIEtIr0Yky6BYWdCoE",
    authDomain: "redfootbrasil-c02a4.firebaseapp.com",
    databaseURL: "https://redfootbrasil-c02a4.firebaseio.com",
    storageBucket: "redfootbrasil-c02a4.appspot.com",

  };

  var startups = [];
  firebase.initializeApp(config);

  var database = firebase.database();

  database.ref('startups').once('value', function(snapshot) {
    snapshot.forEach(function(childSnapshot) {
        startups.push(childSnapshot.val());
    });
});
  

  function salvar(){    
        // A post entry.
        var startup = {
            name:  document.getElementById('name').value,
            description: document.getElementById('description').value,
            category: document.getElementById('category').value,
            city:  document.getElementById('city').value,
            website:  document.getElementById('website').value,
        };


        var file = document.getElementById("logo_src").files[0];

        var storageRef = firebase.storage().ref();
        
        //dynamically set reference to the file name
        startup.logo = "startup_img/"+file.name;

        var thisRef = storageRef.child(startup.logo);

        //put request upload file to firebase storage
        thisRef.put(file).then(function(snapshot) {
            console.log('Uploaded a blob or file!');

            firebase.database().ref('startups').push(startup).then(function(res){
                alert('Sucesso');
            });
        });
        


  }


</script>

    <style>

    	.category-card {
    		background-color:black;
    		color:white;
    		text-align:center;
    		border-radius:3px;
    		padding:5px;
    	}

    	.category-card .title {
    		font-size:18pt;
    		font-weight:bold;
    	}

    	.category-card .description {
    		font-size:12pt;
    	}

    	#bg-popup {
    		position:fixed;top:0;bottom:0;left:0;right:0;background-color:rgba(0,0,0,.75);margin:uto;
    		padding: 0 250px;
    		height: 1000px;
    		display:none;
    	}

    	#bg-popup.active {
    		display:block;	
    	}

    </style>

<div style="text-align: center;">
	<h1>Comunidade de Startups do Norte do Paraná</h1>
	<input type="text" placeholder="Crie sua startup!" />
	<button style="background-color: green; color: white;" type="submit" onclick="$('#bg-popup').toggleClass('active');">CADASTRE</button>
</div>

<div>
	<iframe style="border: 0;" src="http://192.168.5.32/redfoot/firebase-utils/cluster.html" width="100%" height="300"></iframe></div>
<div>

<div class="row">
	<div class="col-md-3">
		<div class="category-card">
			<div class="title">8</div>
			<div class="description">Saúde</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="category-card">
			<div class="title">8</div>
			<div class="description">Saúde</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="category-card">
			<div class="title">8</div>
			<div class="description">Saúde</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="category-card">
			<div class="title">8</div>
			<div class="description">Saúde</div>
		</div>
	</div>
</div>

<div id="bg-popup">

        <div style="background-color:white;padding:15px;margin-top:200px;margin:auto;">
	        <div class="text-right" onclick="$('#bg-popup').toggleClass('active');">
				FECHAR
			</div>
	        Nome: <input type="text" name="name" id="name" /> <br/>
	        Descricao: <textarea  name="description" id="description" ></textarea> <br/>
	           Logo: <input type="file" name="logo" id="logo_src" /> <br/>
	        Cidade: <input type="text" name="city" id="city" /> <br/>
	        Categoria: <select id="category">
	            <option value="Agronegócio">Agronegócio</option>
	             <option value="Fintech">Fintech</option>
	             <option value="Saúde">Saúde</option>

	        </select> <br/>
	        Website: <input type="text" name="website" id="website" /> <br/>
	        <button type="button" onclick="salvar();">Enviar</button>
        </div>

</div>

    <?php
}

//* Run the Genesis loop
//genesis();
get_header();
do_action('mobi_landing_loop');
get_footer();
