<div class="word" id="word">
    <h1>{{$word->word}}</h1>
    <h2>{{$word->translation}}</h2>
    <hr>
    <div class="divider">
        <div class="category">
            <i>{{$word->category}}</i>
        </div>
        <div class="explanation">
            <p class="explanationP">{{$word->explanation}}</p>
            <i class="extra">{{$word->extra}}</i>
        </div>
    </div>
</div>
