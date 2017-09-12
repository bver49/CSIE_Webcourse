class AddViewcountToStore < ActiveRecord::Migration
  def change
    add_column :stores, :view_count, :integer,:default => '0'
  end
end
