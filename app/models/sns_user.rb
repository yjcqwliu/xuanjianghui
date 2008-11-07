class SnsUser < ActiveRecord::Base
    serialize :friend_ids
	has_many :sns_my_activity,:order => 'id desc ' 
	
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
	def location_activity(conditionstr = nil)
	    act ||= Activity.find(:all,:conditions => [" act_location = ? #{conditionstr}",act_location], :order => " updated_on DESC")
	end
	def my_activity    #获取当前用户已经关注的宣讲会信息，返回Activity数组
	    tmp_activity = []
		sns_my_activity.each do |a|
		      if a.join 
				  tmp_act = Activity.find(:first,:conditions => [" id = ?",a.activity_id])
					 tmp_activity << tmp_act if tmp_act
			  end
		end
		tmp_activity
	end
	def friend_activity  #获取当前用户好友已经关注的宣讲会信息，返回Activity数组
	    tmp_activity = []
		my_friend_ids = []
		SnsUser.find(:all,:conditions => [" xid in (?) ",friend_ids] ).each do |u|
		    my_friend_ids << u.id
		end
		pp("-----my_friend_ids:#{my_friend_ids.inspect}--------")
		friend_join_activity = SnsMyActivity.find(:all,:conditions => [" sns_user_id in (?)",my_friend_ids])
		pp("-----friend_join_activity:#{friend_join_activity.inspect}--------")
		friend_join_activity.each do |a|
		      if a.join 
				  tmp_act = Activity.find(:first,:conditions => [" id = ?",a.activity_id])
				  tmp_activity << tmp_act if tmp_act
			  end
		end
		tmp_activity
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
