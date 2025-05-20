@extends('layouts.app')

@section('content')
  <h1>{{ $data['name'] }}</h1>
  <img src="{{ $data['emblem'] }}" alt="{{ $data['name'] }} emblem" style="width: 100px;">
  <h3>Current Season: {{ $data['currentSeason']['startDate'] }} - {{ $data['currentSeason']['endDate'] }}</h3>
  <p>Current Matchday: {{ $data['currentSeason']['currentMatchday'] }}</p>
  <p>Competition Area: {{ $data['area']['name'] }} ({{ $data['area']['code'] }})</p>

  <h2>Participating Teams</h2>
  <ul>
    @foreach ($teams as $team)
      <li>
        <img src="{{ $team['crest'] }}" alt="{{ $team['name'] }} logo" style="width: 50px;">
        {{ $team['name'] }} (Founded: {{ $team['founded'] ?? 'N/A' }})
      </li>
    @endforeach
  </ul>
@endsection
