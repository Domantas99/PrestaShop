


  <form  action="{$commentSubmit}" method = "POST" class="CommentSubmit" id="comment" >
      <ul class="rate-area">
          <input type="radio" id="5-star" name="rating" value="5" required >    <label for="5-star" title="Amagizing">5 stars</label>
          <input type="radio" id="4-star" name="rating" value="4" required >    <label for="4-star" title="Good">4 stars</label>
          <input type="radio" id="3-star" name="rating" value="3" required >    <label for="3-star" title="Average">3 stars</label>
          <input type="radio" id="2-star" name="rating" value="2" required >    <label for="2-star" title="Not Good">2 stars</label>
          <input type="radio" id="1-star" name="rating" value="1" required >    <label for="1-star" title="Bad">1 star</label> <br>
      </ul>
      <br>  <br>  <br>
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="email" name="email" placeholder="Email" required>     <br>
        <input type="text" name="phone_number" placeholder="Phone number" ><br>
        <textarea name="comment" rows="2" cols="50" placeholder="Comment"  maxlength="250" required></textarea><br>
      <input name="id_product" type="hidden" value="{$product.id}" ><br>
      <input type="submit"    name="submit"   value="Comment" >
      <input type="reset"     name="reset"    value="Delete" >

  </form>
  <ul>
      <br>
      <h1>Comments</h1>
      {foreach from=$comments item=comment}

          <div class="row card commentBlock">
              <div class="col-xs-10 h4 ">{$comment['username']}</div>
              <div class="col-xs-2">{$comment['star_rating']}/5 </div>
              <p class="col-xs-12">{$comment['comment']}</p>


          </div>


      {/foreach}
  </ul>






