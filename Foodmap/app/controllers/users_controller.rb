class UsersController < ApplicationController
  before_action :check_login , only: %i[edit]
  def index
    @user = current_user
    @store = current_user.stores
  end
  
  def create_login_session
    user =User.find_by_email(params[:email])
    if user && user.authenticate(params[:password])
      session[:user_id]=user.id
      flash[:success] = "登入成功"
      redirect_to root_path 
    else
      flash[:danger] = "登入失敗"
      redirect_to :login
    end
  end

  def signup
    @user=User.new
  end

  def edit
    @user = current_user
  end

  def update
    if current_user.update(user_params)
      flash[:success] = "更新成功"
      redirect_to root_path
    else
      flash[:danger] = "更新失敗"
      redirect_to users_path
    end
  end

  def create
    user=User.new(user_params)
    if user.save
      flash[:success] = "註冊成功"
      redirect_to root_path
    else
      flash[:danger] = "註冊失敗"
      redirect_to signup_path
    end
  end

  def logout
    session[:user_id]=nil
    flash[:success] = "登出成功"
    redirect_to root_path
  end

  private
   def user_params
     params.require(:user).permit!
   end
end