# Part of IslamApp. See LICENSE file for full copyright and licensing details.

from datetime import datetime
from application import db

class RoleModel(db.Model):

	id = db.Column(db.Integer, primary_key=True)
	name = db.Column(db.String(64), index=True, unique=True)
	description = db.Column(db.String(120))
	created_at = db.Column(db.DateTime, default=datetime.utcnow)

	role_user_relation = db.relationship('UserModel')

	def create(self, **kwargs):
		data = kwargs['data']
		self.name = data.get('name').lower()
		self.description = data.get('description')
		db.session.add(self)
		db.session.commit()

	def update(self, obj, **kwargs):
		data = kwargs['data']
		obj.name = data.get('name').lower()
		obj.description = data.get('description')
		db.session.flush()
		db.session.commit()
