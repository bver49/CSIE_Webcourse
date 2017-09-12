class CreateComments < ActiveRecord::Migration
  def change
    create_table :comments do |t|
      t.text :body
      t.integer :user_id
      t.integer :store_id

      t.timestamps null: false
    end
    add_index :comments, :user_id
    add_index :comments, :store_id
  end
end
