<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel CRUD Tutorial With Example - w3path.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    @yield('content')
</div>
<script>
    function getImageByQuery(query) {
        return new Promise((resolve, reject) => {
            console.log('query=', query);
            var API_KEY = '14221442-6a0fd7a776f3d70ad1917d32d';
            var URL = "https://pixabay.com/api/?key=" + API_KEY + "&q=" + encodeURIComponent(query) + "&image_type=photo&pretty=true&page=1&per_page=20";

            fetch(URL).then(response => {
                    response.json().then(body => {
                            resolve(body);
                        }
                    )
                }
            )
        });

    }


    function drawImage() {
        var title = document.getElementById("post_title").value;

        getImageByQuery(title).then((body) => {
                if (body['hits']) {
                    let body_img = body['hits'];
                    let index = parseInt(Math.random() * body_img.length);
                    let imageUrl = body_img[index]['previewURL'];
                    let query_image_elem = document.getElementById("query-image");
                    query_image_elem.src = imageUrl;
                }

            }
        );
    }

    function insertImage() {
        let image_url_textarea = document.getElementById("image_text");
        let query_image_elem = document.getElementById("query-image");
        let image_input = document.getElementById("image_url");
        let url = query_image_elem.src;
        image_input.value = url;
        image_url_textarea.style.background = "url(" + url + ") no-repeat";
        image_url_textarea.style.backgroundSize = "100px auto";
    }
</script>
</body>
</html>