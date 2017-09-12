module MsgsHelper
	def check_msg
		@msg = Msg.where('receive = ? AND status = 0',current_user.email)
		@msg.length
	end
end
