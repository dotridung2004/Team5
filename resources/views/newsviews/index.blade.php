@extends('layouts.newsviews')

@section('main')

<style>
    .parent {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-template-rows: repeat(12, 1fr);
        gap: 9px;
    }

    .div1 {
        grid-column: span 4 / span 4;
        grid-row: span 3 / span 3;
    }

    .div2 {
        grid-column: span 2 / span 2;
        grid-row: span 2 / span 2;
        grid-column-start: 5;
    }

    .div3 {
        grid-column: span 2 / span 2;
        grid-row: span 2 / span 2;
        grid-column-start: 5;
        grid-row-start: 3;
    }

    .div4 {
        grid-column: span 2 / span 2;
        grid-row: span 2 / span 2;
        grid-row-start: 4;
    }

    .div5 {
        grid-column: span 2 / span 2;
        grid-row: span 2 / span 2;
        grid-column-start: 3;
        grid-row-start: 4;
    }

    .div6 {
        grid-column: span 2 / span 2;
        grid-row: span 2 / span 2;
        grid-column-start: 5;
        grid-row-start: 5;
    }

    .div7 {
        grid-column: span 2 / span 2;
        grid-row: span 2 / span 2;
        grid-column-start: 5;
        grid-row-start: 7;
    }

    .div8 {
        grid-column: span 2 / span 2;
        grid-row: span 2 / span 2;
        grid-column-start: 5;
        grid-row-start: 9;
    }

    .div9 {
        grid-column: span 2 / span 2;
        grid-row: span 2 / span 2;
        grid-column-start: 5;
        grid-row-start: 11;
    }

    .div10 {
        grid-column: span 4 / span 4;
        grid-row: span 3 / span 3;
        grid-column-start: 1;
        grid-row-start: 6;
    }

    .div11 {
        grid-column: span 2 / span 2;
        grid-row: span 2 / span 2;
        grid-column-start: 1;
        grid-row-start: 9;
    }

    .div12 {
        grid-column: span 2 / span 2;
        grid-row: span 2 / span 2;
        grid-column-start: 3;
        grid-row-start: 9;
    }

    .div13 {
        grid-column: span 2 / span 2;
        grid-row: span 2 / span 2;
        grid-column-start: 1;
        grid-row-start: 11;
    }

    .div14 {
        grid-column: span 2 / span 2;
        grid-row: span 2 / span 2;
        grid-column-start: 3;
        grid-row-start: 11;
    }


    /* Đảm bảo các div từ div1 đến div9 có kích thước đầy đủ */
    .div1,
    .div2,
    .div3,
    .div4,
    .div5,
    .div6,
    .div7,
    .div8,
    .div9,
    .div10,
    .div11,
    .div12,
    .div13,
    .div14 {
        height: 100%;
        width: 100%;
    }


    .card {
        height: 100%;
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .card-body {
        flex-grow: 1;
    }


    .card-img-top {
        width: 100%;
        height: auto;
        object-fit: cover;

    }
</style>
<div class="mt-3">
    <div class="container-fluid">
        <div class="parent">
            @foreach($news as $new)
            <div class="div{{$loop->iteration}}">
                <div class="card">
                    <img src="{{ asset('storage/' . $new->path) }}" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column justify-content-end">
                        <a href="{{ route('newsviews.show', $new->matintuc) }}" class="text-decoration-none text-dark">
                            <h5 class="card-title text-dark">{{$new->tentintuc}}</h5>
                            <p class="card-text text-dark">{{$new->mota}}</p>
                        </a>
                        <h6 class="text mt-3">{{ \Carbon\Carbon::parse($new->updated_at)->diffForHumans() }}</h6>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $news->links() }}
        </div>
    </div>

</div>

@endsection