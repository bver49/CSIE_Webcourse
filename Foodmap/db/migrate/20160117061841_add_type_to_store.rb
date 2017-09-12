class AddTypeToStore < ActiveRecord::Migration
  def change
    add_column :stores, :foodtype, :text
  end
end
