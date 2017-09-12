class AddPlaceToStore < ActiveRecord::Migration
  def change
    add_column :stores, :place, :text
  end
end
