class SnsUser < ActiveRecord::Base
    serialize :friend_ids
	has_many :sns_my_activity
	has_many :activity, :through => :sns_my_activity, :order => 'id desc '  do
	    def joined
		     find(:all,:conditions => ["  start_time > ? ", Time.now],:order => "start_time ASC")
		end
		def starting
		     find(:all,:conditions => ["  start_time > ? and end_time < ?  ", Time.now, Time.now],:order => "start_time ASC")
		end
		def timeout
		     find(:all,:conditions => ["  end_time < ? ", Time.now],:order => "start_time ASC")
		end
	end
	
	def self.find_by_xid(t_xid)
	    t_u = SnsUser.find(:first,:conditions => [" xid = ?",t_xid.to_s])
		if t_u
		   t_u
		else
		   t_u = SnsUser.create({:xid => t_xid})
		end
	end
    def xn_session #调用校内API
		@xn_session ||= Xiaonei::Session.new("xn_sig_session_key" => session_key, "xn_sig_user" => xid)
	end
	def my_activity_find_by_id(act_id)  #获取该好友与传入的id对应activity表中记录之间的关系
	    tmp_my_activity = nil
	    sns_my_activity.each do |m|
		    if m.activity_id.to_i == act_id.to_i
			    tmp_my_activity = m
			    break
			end
		end
		tmp_my_activity
	end
end
