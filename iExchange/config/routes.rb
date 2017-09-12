Rails.application.routes.draw do
  devise_for :users , :controllers => { :omniauth_callbacks => "users/omniauth_callbacks" }
  root "posts#index"

  namespace :admin do
    resources :posts
  end
  resources :msgs, except: [:update,:edit]
  resources :posts do
    member do
      put 'close' => 'posts#close_post'
      put 'open' => 'posts#open_post'
      put 'ban' => 'posts#ban_post'
      put 'finish' => 'posts#finish_post'
    end
    resources :comments
  end
end
