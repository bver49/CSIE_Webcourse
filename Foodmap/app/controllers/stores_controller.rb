class StoresController < ApplicationController
  before_action :check_login,only: %i[new]
  before_action :find_store, only: %i[show edit update destroy]
  before_action :check_store_owner,only: %i[edit update destroy]
  
  def index
    if params[:title] && params[:rate] && params[:foodtype]
      @store = Store.where('name LIKE ? AND rate >= ? AND foodtype = ?', "%#{params[:title]}%",params[:rate].to_i,params[:foodtype]).order(created_at: :desc)
    elsif params[:title] && params[:rate]
      @store = Store.where('name LIKE ? AND rate >= ?', "%#{params[:title]}%",params[:rate].to_i).order(created_at: :desc)
    elsif params[:title] && params[:foodtype]
      @store = Store.where('name LIKE ? AND foodtype = ?', "%#{params[:title]}%",params[:foodtype]).order(created_at: :desc)
    elsif params[:rate] && params[:foodtype]
      @store = Store.where('rate >= ? AND foodtype = ?',params[:rate].to_i,params[:foodtype]).order(created_at: :desc)
    else
      @store = Store.all.order(created_at: :desc)
    end
  end

  def create
    @store= Store.new(store_params)
    @store.user_id = current_user.id
    if @store.save
      flash[:success] = "發表成功"
      redirect_to @store 
    else
      flash[:danger] = "發表失敗"
      render 'new' 
    end
  end

  def new
    @store= Store.new
  end

  def destroy
    @store.destroy
    flash[:success] = "刪除成功"
    redirect_to root_path
  end

  def show
    if current_user 
      @userrate = @store.custom_rates.find_by_user_id(current_user.id)
    end
    @hash = Gmaps4rails.build_markers(@store) do |store, marker|
      marker.lat store.latitude
      marker.lng store.longitude
    end
    @store.view_count+=1
    @store.save
    @comments = @store.comments
  end


  def edit
  end

  def update
    if @store.update(store_params)
      redirect_to root_path
    else
      render 'edit'
    end
  end

  def myfood
    @store = current_user.stores
  end

  def draw
    if params[:place] && params[:rate] && params[:foodtype]
      @store = Store.where('rate >= ? AND foodtype = ? AND place = ?',params[:rate].to_i, params[:foodtype], params[:place])
      @store = @store.order("RANDOM()").first
    end
  end

  private


  def find_store
    @store=Store.find(params[:id])
  end

  def store_params
    params.require(:store).permit(:address,:foodtype,:description,:name,:longitude,:latitude,:image,:place)
  end

  def check_store_owner
    @store=Store.find(params[:id])
    if (@store.user_id != current_user.id)
      redirect_to @store
    end
  end
end
