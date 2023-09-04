@extends('layouts/main')

@section('content')
<div class="d-flex justify-content-between container-lg">
    <?php $conditions = [true, false] ?>
    @foreach($conditions as $condition)
        <div class="mt-4">
            <h1 class="text-center text-xl">{{ $condition ? 'Новые задания:' : 'Просмотренные задания:' }}</h1>
            @include('admin/tasklist', ['responses' => $responses, 'condition' => $condition])
        </div>
    @endforeach
</div>
@endsection
