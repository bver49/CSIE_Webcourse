class MsgsController < ApplicationController
  before_action :find_msg, only: %i[show destroy]
  before_action :authenticate_user!
  def index
    @msg = Msg.where('receive = ?',current_user.email).order(created_at: :DESC)
  end

  def create
    @msg= Msg.new(msg_params)
    @msg.user_id = current_user.id
    @msg.sender = current_user.email
    
    if @msg.save

      redirect_to msgs_path , notice: '傳送成功'
    else
      render 'new' , alert: '傳送失敗'
    end
  end

  def new
    @msg= Msg.new
    if params[:receive]
      @msg.receive = params[:receive]
    end

    if params[:title]
      @msg.title = "RE: "+params[:title]
    end

  end

  def destroy
    @msg.destroy
    redirect_to msgs_path , notice: '刪除成功'
  end

  def show
    @msg.status=1
    @msg.save
  end

  private

  def find_msg
    @msg=Msg.find(params[:id])
  end

  def msg_params
    params.require(:msg).permit(:title,:body,:receive)
  end
end
