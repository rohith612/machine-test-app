@extends('layout.base')

@section('content')


<div class="container">

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('merchant.create') }}" class="btn btn-secondary">Add New</a>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Branches</th>
                    {{-- <th scope="col">#</th> --}}
                  </tr>
                </thead>
                <tbody>
                    @forelse ($merchant as $item)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $item -> shopname}}</td>
                            <td>{{ $item -> email}}</td>
                            <td>{{ $item -> mobile}}</td>
                            <td>
                                </ul>
                                @forelse ($item -> branches as $branch)
                                    <li>{{ $branch->location }}</li>
                                @empty
                                    <li>No Branches added</li>
                                @endforelse
                                <ul>
                            </td>
                            {{-- <td>
                                <a href="{{ route('merchant.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                <form class="inline-block" action="{{ route('merchant.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                </form>
            
                            </td> --}}
                        </tr>
                    @empty
                        <tr><td colspan="4">No items exist</td></tr>
                    @endforelse
                  
                </tbody>
              </table>

        </div>
    </div>
</div>    

@endsection