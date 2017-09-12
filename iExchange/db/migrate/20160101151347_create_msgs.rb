class CreateMsgs < ActiveRecord::Migration
  def change
    create_table :msgs do |t|
      t.string :title
      t.string :body
      t.string :user_id
      t.string :receive
      t.string :sender

      t.timestamps null: false
    end
    add_index :msgs, :user_id
  end
end
