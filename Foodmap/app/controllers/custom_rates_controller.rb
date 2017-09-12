class CustomRatesController < ApplicationController
  def create
  	@store=Store.find(params[:store_id])
  	@rates=@store.custom_rates.new(rate_params)
  	@rates.user_id = current_user.id
   	@rates.store_id = @store.id
  	@rates.save!
    @store.update_score
  	redirect_to @store
  end

  def destroy
    @rate=CustomRate.find(params[:id])
    @store=Store.find(@rate.store_id)
    @rate.destroy
    @store.update_score
    redirect_to :back
  end

  private
  def rate_params
  	params.require(:custom_rate).permit(:score)
  end
end
