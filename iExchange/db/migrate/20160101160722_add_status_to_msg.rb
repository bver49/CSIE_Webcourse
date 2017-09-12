class AddStatusToMsg < ActiveRecord::Migration
  def change
    add_column :msgs, :status, :integer ,:default => '0'
  end
end
