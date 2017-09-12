class Admin::PostsController < ApplicationController
  before_action :set_admin_post, only: [:show, :destroy]
  before_action :authenticate_user!
  before_action :check_admin

  def index
    @admin_posts = Admin::Post.all
    @admin_users = Admin::User.all
  end

  def show
  end

  def destroy
    @admin_post.destroy
    redirect_to admin_posts_url, notice: '刪除成功'
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_admin_post
      @admin_post = Admin::Post.find(params[:id])
    end

    def check_admin
      if current_user.id != 1
        redirect_to root_path, notice: '非管理員無法進入管理界面'
      end     
    end


end
