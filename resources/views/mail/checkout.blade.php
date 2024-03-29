<x-mail::message>
    <h1 class="title text-primary text-center">Thông báo đăng ký khóa học</h1>
    @foreach ($cart as $cartItem)
        <div class="row mb-4 d-flex justify-content-between">
            <div class="col-md-2 col-lg-2 col-xl-2">
                <img src="{{ URL::asset('storage/attachments/' . $cartItem['image']) }}"
                    class="img-fluid rounded-3 w-50 h-25" alt="Cotton T-shirt">
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3">
                <a href="{{ route('course.show', ['course' => $cartItem['id']]) }}"
                    class="text-black mb-0">{{ $cartItem['name'] }}</a>
            </div>
            <h2>{{ $cartItem['quantity'] }}<h2>
        </div>
        <hr class="my-4">
    @endforeach
    <h2>Total Price: {{ $total }}$</h2>
    <h3 class="text-center">Cảm ơn bạn đã đặt khóa học </h3>
</x-mail::message>
