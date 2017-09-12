class Store < ActiveRecord::Base
	geocoded_by :address
	has_many :custom_rates, dependent: :destroy
	has_many :comments, dependent: :destroy
	belongs_to :user
	after_validation :geocode, :if => :address_changed?
    has_attached_file :image, styles: { medium: "300x300#", thumb: "100x100#" }
    validates_attachment_content_type :image, content_type: /\Aimage\/.*\Z/
    validates :address, presence: true 
    validates :name, presence: true      
    
    def update_score
    	self.rate = self.custom_rates.average(:score)
    	self.save!
    end
end
 