<div class="" style="text-align: center; padding-bottom: 30px;">
  <h1 style="font-size: 30px; text-align: center; padding-top: 30px; padding-bottom: 20px;">Comments</h1>
  <form class="" action="{{ url('add_comment') }}" method="post">
    @csrf
    <textarea style="height: 150px; width: 600px;" placeholder="Leave a comment here..." name="comment"></textarea>
    <br>
    <input type="submit" class="btn btn-primary" value="Comment">
  </form>
  </div>
  <div class="" style="padding-left: 20%;">
    <h2 style="font-size: 20px; padding-bottom: 20px;">All Comments</h2>

  @foreach($comment as $comment)

  <div class="">
    <strong>{{ $comment->name }}</strong>
    <p>{{ $comment->comment }}</p>
    <a style="color: blue;" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Reply</a>


@foreach($reply as $rep)

@if($rep->comment_id == $comment->id)

  <div style="padding-left: 3%; padding-bottom: 10px; padding-top: 10px;" class="">
    <strong>{{ $rep->name }}</strong>
    <p>{{ $rep->reply }}</p>
    <a style="color: blue;" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Reply</a>
  </div>
  @endif
@endforeach
</div>
  @endforeach

  <!-- Reply Textbook -->

  <div style="display: none;" class="replyDiv">

    <form class="" action="{{ url('add_reply') }}" method="post">
      @csrf

    <input type="text" id="commentId" name="commentId" hidden="">
    <textarea style="height: 100px; width: 500px;" name="reply" placeholder="Add a comment here..."></textarea>
    <br>
    <button type="submit" name="button" class="btn btn-warning">Reply</button>
    <a href="javascript::void(0);" class="btn" onclick="reply_close(this)">Close</a>

    </form>
  </div>
</div>
