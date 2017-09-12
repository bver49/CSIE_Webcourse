class CreateCustomRates < ActiveRecord::Migration
  def change
    create_table :custom_rates do |t|
      t.float :score
      t.integer :user_id
      t.integer :store_id

      t.timestamps null: false
    end
    add_index :custom_rates, :user_id
    add_index :custom_rates, :store_id
  end
end
