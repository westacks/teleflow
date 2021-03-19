<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Channel::filter()->get()->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'integer|required|unique:channels',
            'title' => 'string|max:255|required',
            'photo_url' => 'url|nullable',
            'description' => 'string|nullable',
            'user_id' => 'integer|required|exists:users,id'
        ]);
        return Channel::create($data)->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        return $channel->load('user')->toArray();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Channel $channel)
    {
        $data = $request->validate([
            'title' => 'string|max:255',
            'photo_url' => 'url|nullable',
            'description' => 'string|nullable',
            'user_id' => 'integer|exists:users,id'
        ]);

        return $channel->fill($data)->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        return $channel->delete();
    }
}
