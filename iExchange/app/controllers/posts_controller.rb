class PostsController < ApplicationController
  before_action :find_post, only: %i[show edit update destroy]
  before_action :authenticate_user!, except: [:index, :show]

  def index
      if params[:search]
        @post = Post.where('status = 1 AND title LIKE ?', "%#{params[:search]}%")
      elsif params[:place]
        @post = Post.where('status = 1 AND place LIKE ?', "%#{params[:place]}%") 
      else
        @post= Post.where("status = 1")
      end
  end

  def new
    @post= current_user.posts.build
  end

  def create
    @post = current_user.posts.build(post_params)
    if @post.save
      redirect_to @post , notice: '發表成功'
    else
      render 'new' , alert: '發表失敗'
    end
  end

  def edit
  end

  def update
    if @post.update(post_params)
      redirect_to @post
    else
      render 'edit'
    end
  end

  def destroy
    @post.destroy
    redirect_to root_path , notice: '刪除成功'
  end

  def show
  end

  def close_post
    @post = Post.find(params[:id])
    @post.status=2
    if @post.save
      redirect_to :back , notice: '關閉成功'
    else
      redirect_to :back , alert: '關閉失敗'
    end
  end

  def open_post
    @post = Post.find(params[:id])
    @post.status=1
    if @post.save
      redirect_to @post , notice: '開啓成功'
    else
      redirect_to :back , alert: '開啓失敗'
    end
  end

  def ban_post
    @post = Post.find(params[:id])
    @post.status=3
    if @post.save
      redirect_to @post , notice: '鎖定成功'
    else
      redirect_to :back , alert: '鎖定失敗'
    end
  end

  def finish_post
    @post = Post.find(params[:id])
    @post.status=4
    if @post.save
      redirect_to @post , notice: '確認交換完成'
    else
      redirect_to :back , alert: '確認交換失敗'
    end
  end


  private


  def find_post
    @post=Post.find(params[:id])
  end

  def post_params
    params.require(:post).permit(:title,:description,:itemtype,:place,:image)
  end
end
