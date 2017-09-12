class CommentsController < ApplicationController
  def create
  	@store=Store.find(params[:store_id])
  	@comment=@store.comments.new(comment_params)
  	@comment.user_id = current_user.id
  	@comment.save!
  	respond_to do |format|
  		format.html { redirect_to @comment}
  		format.js
  	end
  end

  def destroy
    @comment = Comment.find(params[:id])
    @comment.destroy
    respond_to do |format|
      format.html { redirect_to @comment}
      format.js
    end
  end

  private
  def comment_params
  	params.require(:comment).permit(:body)
  end
end
