class CommentsController < ApplicationController
  before_action :set_comment, only: [:show, :edit, :update, :destroy]


  def create
    @post = Post.find(params[:post_id])
    @comment = @post.comments.new(comment_params)
    @comment.user = current_user


    if @comment.save
      redirect_to @post
    else
      render :new
    end
  end

  def destroy
    @comment.destroy
    redirect_to :back
  end

  private
  # Use callbacks to share common setup or constraints between actions.
  def set_comment
    @comment = Comment.find(params[:id])
  end

  # Never trust parameters from the scary internet, only allow the white list through.
  def comment_params
    params.require(:comment).permit(:post_id, :body, :user_id)
  end
end
