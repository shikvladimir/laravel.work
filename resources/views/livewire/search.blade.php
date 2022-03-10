<div>

<a href="#win2">
        <div class="input-group">
            <input class="form-control" placeholder="Search ..." type="text" wire:model="searchProduct"/>
            <button type="button" class="btn btn-outline-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                     viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </div>
    </a>


    <a href="#x" class="overlay" id="win2"></a>
    <div class="popup">
        <form class="input-group" name="search" method="post" action="#">
            <input class="form-control" placeholder="Search ..." type="text" wire:model="searchProduct"/>
        </form>

        @foreach($prices as $price)
            <ul>
                <li>
                    <a class="nav-link" href="?page=1#{{$price->product}}">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex ">
                                <div>{{ $price->manufacturer }}&nbsp;</div>
                                <div>{{ $price->product }}</div>
                            </div>
                            <div>{{ $price->price }}</div>
                        </div>
                    </a>
                </li>
            </ul>
        @endforeach
    </div>

    <style>
        /* Базовые стили слоя затемнения и модального окна  */
        .overlay {
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 10;
            display: none;
            /* фон затемнения */
            background-color: rgba(0, 0, 0, 0.65);
            position: fixed; /* фиксированное поцизионирование */
            cursor: default; /* тип курсара */
        }

        /* активируем слой затемнения */
        .overlay:target {
            display: block;
        }

        /* стили модального окна */
        .popup {
            top: -50%;
            right: 0;
            left: 50%;
            font-size: 14px;
            z-index: 20;
            margin: 0;
            width: 85%;
            min-width: 320px;
            max-width: 600px;
            /* фиксированное позиционирование, окно стабильно при прокрутке */
            position: fixed;
            padding: 15px;
            border: 1px solid #383838;
            background: #fefefe;
            /* скругление углов */
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            border-radius: 4px;
            font: 14px/18px 'Tahoma', Arial, sans-serif;
            /* внешняя тень */
            -webkit-box-shadow: 0 15px 20px rgba(0, 0, 0, .22), 0 19px 60px rgba(0, 0, 0, .3);
            -moz-box-shadow: 0 15px 20px rgba(0, 0, 0, .22), 0 19px 60px rgba(0, 0, 0, .3);
            -ms-box-shadow: 0 15px 20px rgba(0, 0, 0, .22), 0 19px 60px rgba(0, 0, 0, .3);
            box-shadow: 0 15px 20px rgba(0, 0, 0, .22), 0 19px 60px rgba(0, 0, 0, .3);
            -webkit-transform: translate(-50%, -500%);
            -ms-transform: translate(-50%, -500%);
            -o-transform: translate(-50%, -500%);
            transform: translate(-50%, -500%);
            -webkit-transition: -webkit-transform 0.6s ease-out;
            -moz-transition: -moz-transform 0.6s ease-out;
            -o-transition: -o-transform 0.6s ease-out;
            transition: transform 0.6s ease-out;
        }

        /* активируем модальный блок */
        .overlay:target + .popup {
            -webkit-transform: translate(-50%, 0);
            -ms-transform: translate(-50%, 0);
            -o-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
            top: 20%;

        }

        /* изображения внутри окна */
        .popup img {
            width: 100%;
            height: auto;
        }

        /* миниатюры слева/справа */
        .pic-left,
        .pic-right {
            width: 25%;
            height: auto;
        }

        .pic-left {
            float: left;
            margin: 5px 15px 5px 0;
        }

        .pic-right {
            float: right;
            margin: 5px 0 5px 15px;
        }

        /* элементы м-медиа, фреймы */
        .popup embed,
        .popup iframe {
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            display: block;
            margin: auto;
            min-width: 320px;
            max-width: 600px;
            width: 100%;
        }

        .popup h2 { /* заголовок 2 */
            margin: 0;
            color: #008000;
            padding: 5px 0px 10px;
            text-align: left;
            text-shadow: 1px 1px 3px #adadad;
            font-weight: 500;
            font-size: 1.4em;
            font-family: 'Tahoma', Arial, sans-serif;
            line-height: 1.3;
        }

        /* параграфы */
        .popup p {
            margin: 0;
            padding: 5px 0
        }
    </style>
</div>
