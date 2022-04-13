<div class="col-md-5 col-12">
    <ul class="list-group mb-5">
        @foreach ($links as $item)
            <a href="{{ $item->url }}">
                <li class="col-12 bg-white px-2 py-2 mb-2 list-group-item text-center">
                    <span class="fs-6 float-center">{{ $item->name }}<span>
                </li>
            </a>
        @endforeach
    </ul>
    <div class="mb-3">
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Cari Produk">
    </div>
    <div>
        <ul class="tag">
            <li>
                <input type="radio" id="a25" name="amount" />
                <label for="a25">$25</label>
            </li>
            <li>
                <input type="radio" id="a50" name="amount" />
                <label for="a50">$50</label>
            </li>
            <li>
                <input type="radio" id="a75" name="amount" checked="checked" />
                <label for="a75">$75</label>
            </li>
            <li>
                <input type="radio" id="a100" name="amount" />
                <label for="a100">$100</label>
            </li>
            <li>
                <input type="radio" id="other" name="amount" />
                <label for="other">other:</label>
            </li>
            <li>
                <input type="text" id="otherAmount" name="numAmount" />
            </li>
        </ul>
    </div>

    <style>
        .tag {
            list-style-type: none;
            margin: 25px 0 0 0;
            padding: 0;
        }

        .tag li {
            float: left;
            margin: 0 5px 0 0;
            width: 100px;
            height: 40px;
            position: relative;
        }

        .tag label,
        .tag input {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .tag input[type="radio"] {
            opacity: 0.01;
            z-index: 100;
        }

        .tag input[type="radio"]:checked+label,
        .Checked+label {
            background: yellow;
        }

        .tag label {
            padding: 5px;
            border: 1px solid #CCC;
            cursor: pointer;
            z-index: 90;
        }

        .tag label:hover {
            background: #DDD;
        }

    </style>
</div>
