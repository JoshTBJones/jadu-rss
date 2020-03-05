<?php

namespace App\Http\Controllers;

use App\Feed;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Auth;

class FeedController extends Controller
{
    /**********************************************************************//**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Support\Facades\View
     */
    public function store(Request $request)
    {
        $feed = new Feed();

        $feed->name    = $request->name;
        $feed->source  = $request->source;
        $feed->team_id = $request->team_id;
        $feed->created_by = Auth::id();
        $feed->updated_by = Auth::id();

        if ($feed->save())
        {
            return view('rss.index');
        }
        else
        {
            return
                back()
                ->with('error', 'Feed not found');
        }
    }

    /**********************************************************************//**
     * Display the specified resource.
     *
     * @param  int  $feed_id
     * @return Illuminate\Support\Facades\View
     */
    public function show(int $feed_id)
    {
        $feed = Feed::find($feed_id);

        if(!$feed)
        {
            return
                back()
                ->with('error', 'Feed not found');
        }

        return view('rss.show', [
            'feed' => $feed
        ]);
    }

    /**********************************************************************//**
     * View Feed Data
     * 
     * @param Illuminate\Http\Request   $request
     * @param int                       $feed_id 
     * @return Illuminate\Support\Facades\View
     */
    public function view (Request $request, int $feed_id)
    {
        try
        {
            $feed = Feed::find($feed_id);

            $items = \App\Feed::find($feed_id)->retrieve()->getItems();

            $offset = 0;

            if ($request->page > 1)
            {
                $offset = ($request->page * 10) / 2;
            }

            $items_to_paginate = array_slice ( $items, $offset );

            $items_pagination = new Paginator($items_to_paginate, 10);
            $items_pagination->withPath('/feeds/1/view');

            if(!$feed)
            {
                return
                    back()
                    ->with('error', 'Feed not found');
            }

            return view('rss.view', [
                'feed'  => $feed,
                'items' => $items_pagination,
                'page'  => $request->page
            ]);
        }
        catch (\Exception $e)
        {
            return
                back()
                ->with('error', $e->getMessage());
        }
    }

    /**********************************************************************//**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $feed_id
     * @return Illuminate\Support\Facades\View
     */
    public function update(Request $request, int $feed_id)
    {
        try
        {
            $feed = Feed::find($feed_id);

            if (!$feed)
            {
                return
                    back()
                    ->with('error', 'Feed not found');
            }

            $feed->name    = $request->name;
            $feed->source  = $request->source;
            $feed->updated_by = Auth::id();

            if ($feed->save())
            {
                return
                    back()
                    ->with('message', 'Feed successfully updated.');
            }
        }
        catch (\Exception $e)
        {
            return
                back()
                ->with('error', $e->getMessage());
        }
    }

    /**********************************************************************//**
     * Remove the specified resource from storage.
     *
     * @param  int $feed_id
     * @return Illuminate\Support\Facades\View
     */
    public function destroy(int $feed_id)
    {
        try
        {
            $feed = Feed::find($feed_id);

            if (!$feed)
            {
                return
                    back()
                    ->with('error', 'Feed not found');
            }
    
            if ($feed->delete())
            {
                return
                    redirect('feeds')
                    ->with('message', 'Feed successfully deleted.');
            }
        }
        catch (\Exception $e)
        {
            return
                back()
                ->with('error', $e->getMessage());
        }
    }
}
