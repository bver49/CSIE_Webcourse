class User < ActiveRecord::Base
	has_secure_password
	has_many :custom_rates
	has_many :stores
	has_many :comments
	validates :email, presence: true, uniqueness: true
	validates :name, presence: true
	validates :password, presence: true, length: { minimum: 6 }
end
