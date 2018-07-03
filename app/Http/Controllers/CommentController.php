<?php

namespace App\Http\Controllers;
use App\Notifications\NewComment;
use App\Model\User\Comment;
use App\Model\User\Order;
use Illuminate\Http\Request;
use App\Model\Admin\admin;
class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin',['except' => 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminCommentShow()
    {
        $comments=Comment::All();

        return view("Comments/comments",['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$order_id)
    {
        $this->validate($request,[
                'name' => 'required|max:225',
                'email' => 'required|max:225',
                'comment' => 'required|max:2000|min:5'
        ]);
        $order = Order::findorfail($order_id);
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->order()->associate($order);
        $comment->save();
        $adminuser = admin::find(1);
        $adminuser->notify(new NewComment($comment));
       return redirect()->route('user.orders.show', [$order->id])->with('success-comment','Comment was added.!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\User\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\User\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $comment=Comment::findorfail($id);
        return view('Comments.edit')->withComment($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\User\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $comment = Comment::findorfail($id);
        $this->validate($request,['comment' => 'required']);
        $comment ->comment = $request->comment;
        $comment->save();
        return redirect()->route('comments.admin')->with('success','Comment Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\User\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findorfail($id);
        $comment->delete();
        return response()->json($comment);
    }
}
