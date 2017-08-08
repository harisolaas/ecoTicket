<div class="promotion-box">
    <div class="img-container">
        <img src="{{ $promotion->banner_path }}" alt="Promotion banner">
    </div>
    <a href="{{ str_contains(request()->path(), 'seller') ? '/seller/home' : '' }}/promotion/{{ $promotion->id }}"><h3>{{ $promotion->title }}</h3></a>
    <p>{{ $promotion->desc }}</p>
</div>
