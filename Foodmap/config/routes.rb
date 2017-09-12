Rails.application.routes.draw do

  root 'stores#index'
  resources :comments, only: [:destroy] 
  resources :custom_rates, only: [:destroy] 
  resources :stores do
    resources :comments, only: [:create] 
    resources :custom_rates, only: [:create] 
  end
  get "myfood" => "stores#myfood"
  get "draw" => "stores#draw"
  get "login" => "users#login", :as => "login"
  get 'signup' => 'users#signup',:as => 'signup'
  post "create_login_session" => "users#create_login_session"
  delete "logout" => "users#logout", :as => "logout"
  resources :users, only: [:index,:create,:update,:edit] 
end
