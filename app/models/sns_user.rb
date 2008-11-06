class SnsUser < ActiveRecord::Base
    serialize :friend_ids
	has_many :sns_my_activity,:order => 'id desc ' 
	
	def self.find_by_xid(t_xid)
	    t_u = SnsUser.find(:all,:conditions => [" xid = ?",t_xid.to_s])
		if t_u.length >= 1
		   t_u.first
		else
		   t_u = SnsUser.create({:xid => t_xid})
		end
	end
    def xn_session
		@xn_session ||= Xiaonei::Session.new("xn_sig_session_key" => session_key, "xn_sig_user" => xid)
	end
	def location_activity(conditionstr = nil)
	    act ||= Activity.find(:all,:conditions => [" act_location = ? #{conditionstr}",act_location], :order => " updated_on DESC")
	end
	def my_activity_find_by_id(tmp_id)
	    tmp_my_activity = nil
		pp "----------sns_my_activity:#{sns_my_activity.inspect}---------------"
	    sns_my_activity.each do |m|
		    if m.activity_id.to_i == tmp_id.to_i
			    tmp_my_activity = m
			    break
			end
		end
		pp "----------tmp_my_activity:#{tmp_my_activity.inspect}---------------"
		tmp_my_activity
	end
end
