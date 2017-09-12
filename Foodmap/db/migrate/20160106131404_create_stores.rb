class CreateStores < ActiveRecord::Migration
  def change
    create_table :stores do |t|
      t.string :address
      t.float :latitude
      t.float :longitude
      t.string :name
      t.float :rate,:default => '0'
      t.text :description

      t.timestamps null: false
    end
  end
end
