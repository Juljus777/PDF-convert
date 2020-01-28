<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .PDFcontainer {
            position: relative;
            width: 794px;
            height: 1122px;
            left: 50%;
            transform: translate(-50%, 0%);
            background-color:white;
        }

        .header {
            position: relative;
            padding-top: 20px;
            padding-bottom: 20px;
            width: 90%;
            left: 50%;
            transform: translate(-50%, 0%);
        }

        hr {
            color: black;
            margin: 10px 0;
        }

        .word {
            position: relative;
            width: 90%;
            height: auto;
            left: 50%;
            transform: translate(-50%, 0%);
        }

        .divider {
            display: flex;
            flex-flow: row wrap;
            padding-bottom: 20px;
        }

        .category {
            order: 1;
            flex-basis: 20%;
        }

        .explanation {
            flex-basis: 75%;
            order: 2;
        }

        .explanationP {
            margin-bottom: 10px;
        }
        #cover{
            position:relative;
            background: linear-gradient(0deg, rgba(230,87,88,1) 0%, rgba(119,29,50,1) 100%);
        }
        #cover p {
            color:white;
        }
        #backCover{
            position:relative;
            background: linear-gradient(0deg, rgba(230,87,88,1) 0%, rgba(119,29,50,1) 100%);
        }
        .coverContainer{
            position:relative;
            left:50%;
            top:40%;
            transform:translate(-50%,-40%);
        }
        .coverTitle{
            text-align:center;
            position: relative;
            transform: translate(-50%,0%);
            left:50%;
            font-size:40px;
        }
        .coverYear{
            text-align:center;
            position: relative;
            transform: translate(-50%,0%);
            left:50%;
            font-size:30px;
        }
        .authorSection{
            position:relative;
            width:90%;
            top:70%;
            transform: translate(-50%,-70%);
            left:50%;
        }
        .pageNumber{
            position:relative;
            max-width:30px;
            top:90%;
            left:95%;
            transform: translate(-95%,0);
        }
        .menu{
            position:absolute;
            height:100px;
            width:100px;
        }
    </style>
</head>
<body id="body">
<div class="menu">
    <a href="/makepdf"><button>make pdf</button></a>
</div>
<div class="PDFcontainer" id="cover">
    <div class="coverContainer">
        <div class="coverTitle">
            <p>Lorem Ipsium Sõnaraamat</p>
        </div>
        <div class="coverYear">
            <p>2019</p>
        </div>
    </div>
    <div class="authorSection">
        <p>Autor: Juljus Pärt</p>
    </div>
</div>
<div class="PDFcontainer" id="page1">
    <div class="header">
        <p>Tere see on mingi pealdis</p>
    </div>
    <div class="pageNumber">
        <p id="pageNumber">1</p>
    </div>
</div>


<script type="text/javascript">
    const words = [
        @foreach ($words as $word)
            ["{{ $word->word }}",
            "{{ $word->translation }}",
            "{{$word->category}}",
            "{{$word->explanation}}",
            "{{$word->extra}}"],
        @endforeach
    ];
    const h = 1122;
    let pagewords = [];
    let totalHeight = 0;
    let page = 1;
    let currentpage = document.getElementById(`page1`);
    let body = document.getElementById('body');
    words.sort();
    for (i = 0 ; i !== words.length; i++) {
        //Make a new word
        pagewords.push(`word${i}`);
        currentpage.innerHTML += `<div class="word" id="word${i}">
                                            <h1>${words[i][0]}</h1>
                                            <h2>${words[i][1]}</h2>
                                            <hr>
                                            <div class="divider">
                                                <div class="category">
                                                    <i>${words[i][2]}</i>
                                                </div>
                                            <div class="explanation">
                                                <p class="explanationP">${words[i][3]}</p>
                                                <i>${words[i][4]}</i>
                                            </div>
                                        </div>
                                    </div>`;
        //Make a new page if all the words height < page height
        //and dont make a new one if there are no further words to add
        totalHeight += document.getElementById(`word${[i]}`).offsetHeight;
        if(totalHeight >= h - 300 && words[i+1] !== undefined){
            page++;
            pagewords.length = 0;
            body.innerHTML += `<div class="PDFcontainer" id="page${page}">
                                    <div class="header">
                                        <p>Tere see on mingi pealdis</p>
                                    </div>
                                    <div class="pageNumber">
                                        <p id="pageNumber">${page}</p>
                                    </div>
                                </div>`;
            totalHeight = 0;
            currentpage = document.getElementById(`page${page}`);
        }
    }
</script>
<div class="PDFcontainer" id="backCover">

</div>
</body>
</html>
